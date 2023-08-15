<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Song;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\Admin\SongFormRequest;

class MultiSongController extends Controller
{
    public function index()
    {
        $songs = DB::table('songs')->orderBy('created_at', 'DESC')->paginate(4);

    if (request()->ajax()) {
        // If the request is an AJAX request, return the songs as a JSON response
        return response()->json([
            'songs' => $songs->items(),
            'next_page_url' => $songs->nextPageUrl()
        ]);
    }
        return view('dashboard.songss.index', compact('songs'));
    }

    public function all()
    {
        $songs = DB::table('songs')->orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.songs.all', compact('songs'));
    }
   

    public function import(Request $request) 
    {
        $request->validate([
            'track_ids' => 'required',
        ]);

        $trackIds = explode(',', $request->input('track_ids'));

        foreach ($trackIds as $trackId) {
            // Process each track ID individually

            // Validate the track ID (you may want to add additional validation)

            // Set up Guzzle HTTP client
            $client = new Client();

            // Get Spotify client ID and client secret from configuration
            $clientId = env('SPOTIFY_CLIENT_ID');
            $clientSecret = env('SPOTIFY_CLIENT_SECRET');

            // Get the access token
            $accessToken = $this->getAccessToken($clientId, $clientSecret);

            // Spotify API endpoint to fetch a specific track
            $endpoint = 'https://api.spotify.com/v1/tracks/' . $trackId;

            // Spotify API request headers
            $headers = [
                'Authorization' => 'Bearer ' . $accessToken,
                'Accept' => 'application/json',
            ];

            // Make the API request
            $response = $client->request('GET', $endpoint, [
                'headers' => $headers,
            ]);

            // Get the response body
            $data = json_decode($response->getBody(), true);

            // Extract relevant information from the response
            $artist = $data['artists'][0]['name'];
            $artistId = $data['artists'][0]['id'];
            $album = $data['album']['name'];
            $spotifyUri = $data['uri'];
            $previewUrl = $data['preview_url'];
            $durationMs = $data['duration_ms'];
            $popularity = $data['popularity'];
            $imageUrl = $data['album']['images'][0]['url'];
            $trackName = $data['name'];

            // Get the YouTube video ID
            $youtubeId = $this->getRelatedYouTubeVideoId($artist, $trackName);

            // Check if the YouTube video ID is valid and embeddable
            if (!$youtubeId) {
                return redirect()->back()->withErrors(['youtube_id' => 'Failed to fetch YouTube video ID for Track ID: ' . $trackId]);
            }

            // Store the data in the database
            DB::table('songs')->insert([
                'track_id' => $trackId,
                'artist' => $artist,
                'artist_id' => $artistId,
                'youtube_id' => $youtubeId,
                'karaokevid' => $youtubeId,
                'album' => $album,
                'spotify_uri' => $spotifyUri,
                'preview_url' => $previewUrl,
                'duration_ms' => $durationMs,
                'popularity' => $popularity,
                'image_url' => $imageUrl,
                'track_name' => $trackName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Songs imported successfully');
    }
    public function create()
    {  
        $songs = DB::table('songs')->orderBy('created_at', 'DESC')->paginate(4);
        return view('dashboard.songs.create', compact('songs'));
    }

    public function store(SongFormRequest $request)
    {
        // Set up Guzzle HTTP client
        $client = new Client();
    
        // Get Spotify client ID and client secret from configuration
        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');
    
        $trackId = $request->input('track_id');
        // Get the access token
        $accessToken = $this->getAccessToken($clientId, $clientSecret);
    
        $data = $request->validated();
    
        // Find or create the artist
        $artist = Artist::firstOrCreate(
            ['name' => $data['artist']],
            [
                'genres' => implode(',', $data['genres']),
                'image_url' => $data['images'][0]['url'],
                'popularity' => $data['popularity'],
                'spotify_uri' => $data['uri'],
                // Set other attributes for the artist if available
            ]
        );
    
        // Save the artist to the database
        $artist->save();
    
        $song = new Song();
        $song->track_name = $data['track_name'];
        $song->youtube_id = $data['youtube_id'];
        $song->album = $data['album'];
    
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/songs/', $filename);
            $song->image_url = $filename;
        }
    
        try {
            $response = $client->get("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");
            $lyrics = $response->getBody()->getContents();
        } catch (RequestException $e) {
            // Handle the request exception here
            // Log the error, display an error message, or provide a fallback lyrics
            $lyrics = 'Lyrics not available';
        }
    
        $song->lyrics = $lyrics;
        $song->preview_url = $data['preview_url'];
    
        // Associate the song with the artist
        $song->artist()->associate($artist);
    
        $song->save();
    
        return view('dashboard.songs.index')->with('message', 'Song added successfully');
    }
    
    
    
    
    private function getAccessToken($clientId, $clientSecret)
    {
        $client = new Client();

        // Spotify Accounts API endpoint for obtaining access token
        $endpoint = 'https://accounts.spotify.com/api/token';

        // Spotify Accounts API request headers
        $headers = [
            'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        // Spotify Accounts API request body
        $body = [
            'grant_type' => 'client_credentials',
        ];

        // Make the API request
        $response = $client->request('POST', $endpoint, [
            'headers' => $headers,
            'form_params' => $body,
        ]);

        // Get the response body
        $data = json_decode($response->getBody(), true);

        return $data['access_token'];
    }

    private function getRelatedYouTubeVideoId($artist, $trackName)
    {
        // Initialize Google API client
        $client = new \Google_Client();
        $client->setApplicationName('karaoke');
        $client->setDeveloperKey(env('YOUTUBE_API_KEY'));

        // Create YouTube service
        $youtube = new \Google_Service_YouTube($client);

        // Prepare search query
        $searchQuery = $artist . ' ' . $trackName .  ' karaoke' .  ' lyrics' .  ' official';

        // Set search parameters
        $searchParams = [
            'q' => $searchQuery,
            'maxResults' => 1,
            'type' => 'video',
            'videoEmbeddable' => 'true',
        ];

        // Execute search request
        $searchResponse = $youtube->search->listSearch('snippet', $searchParams);

        // Check if any search results are found
        if (empty($searchResponse['items'])) {
            return null;
        }

        // Extract the first search result (video ID)
        $youtubeId = $searchResponse['items'][0]['id']['videoId'];

        return $youtubeId;
    }



    public function submitVote(Request $request, Singer $singer)
    {
        // Update the vote count in the database
        $singer->increment('vote_count');
        
        // Return a response (optional)
        return response()->json(['success' => true]);
    }

    public function getLiveVotes()
    {
        // Fetch the latest vote counts from the database
        $liveVotes = Singer::select('id', 'vote_count')->get();
        
        // Return the vote counts in JSON format
        return response()->json($liveVotes);
    }





    
}


