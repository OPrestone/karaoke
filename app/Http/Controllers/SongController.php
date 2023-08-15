<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Google_Client;
use App\Models\Song;
use App\Models\Artist;
use GuzzleHttp\Client;
use Google_Service_YouTube;
use App\Imports\SongsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\Admin\SongFormRequest;
use Maatwebsite\Excel\Validators\ValidationException;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::where('lyrics', '!=','null')->orderBy('created_at', 'DESC')->paginate(4);

    if (request()->ajax()) {
        // If the request is an AJAX request, return the songs as a JSON response
        return response()->json([
            'songs' => $songs->items(),
            'next_page_url' => $songs->nextPageUrl()
        ]);
    }
        return view('dashboard.songs.index', compact('songs'));
    }

    public function all()
    {
        $songs = Song::where('lyrics', '!=','null')->orderBy('created_at', 'DESC')->paginate(10);
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.songs.all', compact('songs','artists'));
    }
    public function viewAll()
    {
        $songs = Song::where('lyrics', '!=','null')->orderBy('popularity', 'DESC')->take(600)->get();
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.songs.all', compact('songs','artists'));
    }
    public function import(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls',
    ]);

    // Get the uploaded file
    $file = $request->file('excel_file');

    // Import the data from the Excel file using the SongsImport class
    try {
        Excel::import(new SongsImport, $file);
    } catch (\Exception $e) {
        echo $e->getMessage();
        return redirect()->back()->withErrors(['excel_file' => 'Error importing songs from the Excel file. Please check the file format and try again.,'.$e->getMessage()]);
    }
    catch(ValidationException $e)
    {
        echo $e->failures();
    }

}
public function imports(Request $request)
{
    // Validate the form input
    $request->validate([
        'excel_file' => 'required|mimes:xlsx',
        'track_name' => 'required',
        'karaokevid' => 'nullable',
        'youtube_id' => 'nullable',
        'lyrics' => 'nullable',
    ]);

    // Set up Guzzle HTTP client
    $client = new Client();

    // Get Spotify client ID and client secret from configuration
    $clientId = 'c977a9c0addb40fb8ce10dfefd5bbf81';
    $clientSecret = '2ec6a460145f44fc845dfc771f5f701b';

    // Get the access token
    $accessToken = $this->getAccessToken($clientId, $clientSecret);

    // Spotify API endpoint to search for a track
    $trackName = $row['track_name'];
    $artistName = $row['artist'];

    // Use dd() to dump and die the data to the screen for debugging
    dd($trackName, $artistName);

    // Validate the form input
    $request->validate([
        'excel_file' => 'required|mimes:xlsx',
    ]);

    // Get the uploaded file
    $file = $request->file('excel_file');

    // Import the data from the Excel file using the SongsImport class
    try {
        Excel::import(new SongsImport, $file);
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['excel_file' => 'Error importing songs from the Excel file. Please check the file format and try again.']);
    }

    $endpoint = "https://api.spotify.com/v1/search?q=track%3A$trackName%20artist%3A$artistName&type=track";

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

    // Check if any search results are found
    if (empty($data['tracks']['items'])) {
        return redirect()->back()->withErrors(['track_name' => 'Track not found on Spotify']);
    }

    // Extract relevant information from the first search result
    $trackData = $data['tracks']['items'][0];
    $trackId = $trackData['id'];
    $artistId = $trackData['artists'][0]['id'];
    $album = $trackData['album']['name'];
    $spotifyUri = $trackData['uri'];
    $previewUrl = $trackData['preview_url'];
    $durationMs = $trackData['duration_ms'];
    $popularity = $trackData['popularity'];
    $imageUrl = $trackData['album']['images'][0]['url'];
    $youtubeId = $trackData['name'];

    // Get the lyrics of the track using another cURL request
    $lyrics = file_get_contents("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");

    // Check if the YouTube video ID is valid and embeddable
    if (!$youtubeId) {
        return redirect()->back()->withErrors(['youtube_id' => 'Failed to fetch YouTube video ID']);
    }

    // Fetch artist details from Spotify API
    $artistEndpoint = 'https://api.spotify.com/v1/artists/' . $artistId;

    // Make the API request to fetch artist details
    $artistResponse = $client->request('GET', $artistEndpoint, [
        'headers' => $headers,
    ]);

    // Get the response body for artist details
    $artistData = json_decode($artistResponse->getBody(), true);

    $artistBio = $this->getArtistBio($artistName);

    // Log the artistBio to verify the data
    \Log::info("Artist Bio for '$artistName': " . json_encode($artistBio));

    // Check if the artistBio is available
    if (!$artistBio) {
        $artistBio = $artistName;
    }


    $artist = Artist::firstOrCreate([
        'name' => $artistName,
    ], [
        'bio' => $artistBio,
        'genres' => implode(',', $artistData['genres']),
        'image_url' => $artistData['images'][0]['url'],
        'artist_id' => $artistId,
        'popularity' => $artistData['popularity'],
        'spotify_uri' => $artistData['uri'],
    ]);

    // Store the data in the database
    $song = Song::firstOrCreate([
        'track_id' => $trackId,
    ], [
        'song_genres' => implode(',', $artistData['genres']),
        'artist' => $artist->name,
        'artist_id' => $artistId,
        'youtube_id' => $youtubeId,
        'karaokevid' => $youtubeId,
        'album' => $album,
        'spotify_uri' => $spotifyUri,
        'preview_url' => $previewUrl,
        'duration_ms' => $durationMs,
        'popularity' => $popularity,
        'image_url' => $imageUrl,
        'lyrics' => $lyrics,
        'track_name' => $trackName,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect back to the form with a success message
    return redirect()->back()->with('success', 'Song imported successfully');
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
        $client->setDeveloperKey('AIzaSyBI9vh8sul44RzDfY3rXgsLkWc9Os6CSeM');

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



    private function getArtistBio($artistName)
    {
        // Set up Guzzle HTTP client
        $client = new Client();

        // Get Last.fm API key from configuration
        $lastFmApiKey = '3aabc0162ce43b2f1cb78c617ce73fd3';

        // Last.fm API endpoint to fetch artist info
        $endpoint = 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=' . urlencode($artistName) . '&api_key=' . $lastFmApiKey . '&format=json';

        try {
            // Make the API request to fetch the artist's bio from Last.fm
            $response = $client->request('GET', $endpoint);

            // Get the response body
            $data = json_decode($response->getBody(), true);

            if (isset($data['artist']['bio']['summary'])) {
                $artistBio = $data['artist']['bio']['summary'];
            } else {
                $artistBio = null;
            }
            return $artistBio;
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error fetching artist bio from Last.fm: ' . $e->getMessage());
            return null;
        }
    }



}


