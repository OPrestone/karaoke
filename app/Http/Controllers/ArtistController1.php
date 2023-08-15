<?php

namespace App\Http\Controllers;
use Google_Service_YouTube; 
use Google_Client;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\User;
use App\Models\Song;

class ArtistController1 extends Controller
{
    public function index()
    {
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(4);

        if (request()->ajax()) {
            // If the request is an AJAX request, return the artists as a JSON response
            return response()->json([
                'artists' => $artists->items(),
                'next_page_url' => $artists->nextPageUrl()
            ]);
        }

        return view('dashboard.artists.index', compact('artists'));
    }

    public function all()
    {
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.artists.all', compact('artists'));
    }

    public function view($artist_id)
    {
        $artist = Artist::find($artist_id);
        $artists = Artist::all();
        $users = User::all(); 
        $songs = Song::where('artist_id', $artist->artist_id)->get();
        return view('dashboard.artists.view', compact('artist', 'artists', 'users', 'songs'));
    }

    public function frontendView($artist_id)
    {
        $artist = Artist::find($artist_id);
        $artistGenres = $artist->genres; // Assuming you have set up the genres relationship in the Artist model
        $artists = Artist::orderBy('created_at', 'DESC')->get();
        $users = User::all(); 
        $songs = Song::where('artist_id', $artist->artist_id)->get();
        // Find artists with at least one genre in common with the given artist
        $artists = Artist::where('artist_id', '!=', $artist->artist_id)
            ->where('genres',  $artist->genres)
            ->distinct() 
            ->take(6)
            ->get(); 
        return view('frontend.artists.view', compact('artist', 'artists', 'users', 'songs', 'artists'));
    }

    public function import(Request $request)
    {
        // Validate the form input
        $request->validate([
            'artist_id' => 'required',
            'album' => 'nullable',
        ]);

        // Set up Guzzle HTTP client
        $client = new Client();

        // Get Spotify client ID and client secret from configuration
        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');

        // Get the access token
        $accessToken = $this->getAccessToken($clientId, $clientSecret);

        // Spotify API endpoint to fetch a specific artist
        $artistId = $request->input('artist_id');
        $endpoint = 'https://api.spotify.com/v1/artists/' . $artistId;

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
        $artistName = $data['name'];
        $genres = $data['genres'];
        $imageUrl = $data['images'][0]['url'];
        $popularity = $data['popularity'];
        $spotifyUri = $data['uri'];

        // Find or create the artist
        $artist = Artist::firstOrCreate([
            'name' => $artistName,
            'image_url' => $imageUrl, 
            'artist_id' => $artistId,
            'popularity' => $popularity,
            'spotify_uri' => $spotifyUri,
        ]);

        // Make the API request to get the artist's top tracks
        $tracksEndpoint = 'https://api.spotify.com/v1/artists/' . $artistId . '/top-tracks?country=KE';
        $tracksResponse = $client->request('GET', $tracksEndpoint, [
            'headers' => $headers,
        ]);

        // Get the response body
        $tracksData = json_decode($tracksResponse->getBody(), true);

        // Extract relevant information from the response
        $tracks = $tracksData['tracks'];

        // Save the artist's top tracks as songs in the database
        foreach ($tracks as $track) {
            $trackId = $track['id'];

            // Check if the track already exists in the database
            if (Song::where('track_id', $trackId)->exists()) {
                continue; // Skip importing the track
            }

            $name = $track['name'];
            $duration = $track['duration_ms'];

            // Extract relevant information from the response
            $artistName = $track['artists'][0]['name'];
            $album = $track['album']['name'];
            $spotifyUri = $track['uri'];
            $previewUrl = $track['preview_url'];
            $durationMs = $track['duration_ms'];
            $popularity = $track['popularity'];
            $imageUrls = $track['album']['images'][0]['url'];
            $trackName = $track['name'];

            // Get the related YouTube video ID for the song
            $youtubeId = $this->getRelatedYouTubeVideoId($artistName, $trackName);

            // Find or create the artist
            $artist = Artist::firstOrCreate(['name' => $artistName]);

            // Create a new song instance
            $song = new Song([
                'track_id' => $trackId,
                'artist_id' => $artist->id,
                'name' => $name,
                'artist' => $artistName,
                'duration' => $duration,
                'image_url' => $imageUrls,
                'spotify_uri' => $spotifyUri,
                'preview_url' => $previewUrl,
                'duration_ms' => $durationMs,
                'popularity' => $popularity,
                'album' => $album,
            ]);

            // Get the lyrics for the song
            $lyrics = @file_get_contents("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");

            // Set the additional song properties
            $song->lyrics = isset($lyrics) ? $lyrics : null;
            $song->youtube_id = $youtubeId;
            $song->genres = implode(';', $genres);

            // Save the song details to the database
            $song->save();

            // Save the genres to the genres table
            foreach ($genres as $genreName) {
                $genre = Genre::firstOrCreate(['name' => $genreName]);
                $song->genres()->attach($genre);
            }
        }

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Artist and their top tracks imported successfully');
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

        try {
            // Make the API request
            $response = $client->request('POST', $endpoint, [
                'headers' => $headers,
                'form_params' => $body,
            ]);

            // Get the response body
            $data = json_decode($response->getBody(), true);

            if (isset($data['access_token'])) {
                return $data['access_token'];
            } else {
                throw new \Exception('Failed to get access token from Spotify API');
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error fetching access token from Spotify API: ' . $e->getMessage());
            throw new \Exception('Failed to get access token from Spotify API');
        }
    }

    private function getRelatedYouTubeVideoId($artist, $trackName)
    {
        // Initialize Google API client
        $client = new \Google_Client();
        $client->setApplicationName('My First Project');
        $client->setDeveloperKey(env('YOUTUBE_API_KEY'));

        // Create YouTube service
        $youtube = new \Google_Service_YouTube($client);

        // Prepare search query
        $searchQuery = $artist . ' ' . $trackName .  ' karaoke' .  ' lyrics';

        // Set search parameters
        $searchParams = [
            'q' => $searchQuery,
            'maxResults' => 1,
            'type' => 'video',
            'videoEmbeddable' => 'true',
        ];

        try {
            // Execute search request
            $searchResponse = $youtube->search->listSearch('snippet', $searchParams);

            // Check if any search results are found
            if (empty($searchResponse['items'])) {
                return null;
            }

            // Extract the first search result (video ID)
            $youtubeId = $searchResponse['items'][0]['id']['videoId'];

            return $youtubeId;
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error fetching YouTube video ID from YouTube API: ' . $e->getMessage());
            return null;
        }
    }
}
