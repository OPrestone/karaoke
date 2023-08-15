<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class SongController extends Controller
{
    public function index()
    {
        $songs = DB::table('songs')->orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.songs.index', compact('songs'));
    }

    public function all()
    {
        $songs = DB::table('songs')->orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.songs.all', compact('songs'));
    }

    public function import(Request $request)
    {
        // Validate the form input
        $request->validate([
            'track_id' => 'required',
            'karaokevid' => 'nullable',
        ]);

        // Set up Guzzle HTTP client
        $client = new Client();

        // Get Spotify client ID and client secret from configuration
        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');

        // Get the access token
        $accessToken = $this->getAccessToken($clientId, $clientSecret);

        // Spotify API endpoint to fetch a specific track
        $trackId = $request->input('track_id');
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
            return redirect()->back()->withErrors(['youtube_id' => 'Failed to fetch YouTube video ID']);
        }

        // Get the karaoke video ID
        $karaokevid = $request->input('karaokevid');

        // Store the data in the database
        DB::table('songs')->insert([
            'artist' => $artist,
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

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Song imported successfully');
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
        $client->setApplicationName('kenyatimes');
        $client->setDeveloperKey(env('YOUTUBE_API_KEY'));

        // Create YouTube service
        $youtube = new \Google_Service_YouTube($client);

        // Prepare search query
        $searchQuery = $artist . ' ' . $trackName . ' karaoke' . ' lyrics';

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
}
