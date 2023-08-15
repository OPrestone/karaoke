<?php

namespace App\Imports;

use Exception;
use App\Models\Song;
use App\Models\Artist;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SongsImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    public $clientId ;
    public $clientSecret;
    public function __construct()
        {
            $this->clientId = 'c977a9c0addb40fb8ce10dfefd5bbf81';
            $this->clientSecret = '2ec6a460145f44fc845dfc771f5f701b';
        }
    public function collection(Collection $rows){
         foreach($rows as $row){
            $this->imports( $row['artist'],$row['track_name']);

         }
    }
    public function imports($artistName,$trackName)
    {

        // Set up Guzzle HTTP client
        $client = new Client();

        // Get Spotify client ID and client secret from configuration


        // Get the access token
        $accessToken = $this->getAccessToken($this->clientId, $this->clientSecret);

        // Spotify API endpoint to search for a track

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
        $trackName = $trackData['name'];
        $artistId = $trackData['artists'][0]['id'];
        $album = $trackData['album']['name'];
        $spotifyUri = $trackData['uri'];
        $previewUrl = $trackData['preview_url'];
        $durationMs = $trackData['duration_ms'];
        $popularity = $trackData['popularity'];
        $imageUrl = $trackData['album']['images'][0]['url'];
        $youtubeId = $trackData['name'];
        //throw new Exception($trackId);
       try{
        $lyrics = file_get_contents("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");

        // Check if the Lyrics is valid
        if (!$lyrics) {
            return redirect()->back()->withErrors(['youtube_id' => 'Failed to fetch Lyrics']);
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

        // dd($artistData);

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
        $genresString = implode(',', $artistData['genres']);

        // Store the data in the database
        $song = Song::firstOrCreate([
            'track_id' => $trackId,
            'name' => $trackName,
            'song_genres' => $genresString,

        ], [
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


        // Assuming that $genres is an array of genres, convert it to a string
        $genresString = implode(';', $data['genres']);

        // Save the genres string to the song model
        $song->genres = $genresString;
        // Save the song details to the database
        $song->save();

       }
       catch(Exception $e)
       {
        Log::error($artistName.' - '.$e->getMessage());
       }

    }

    private function getAccessToken($clientId, $clientSecret)
    {
        $client = new Client();

        // Spotify Accounts API endpoint for obtaining access token
        $endpoint = 'https://accounts.spotify.com/api/token';

        // Spotify Accounts API request headers
        $headers = [
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
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







    public function chunkSize(): int
    {
        return 10000;
    }
}
