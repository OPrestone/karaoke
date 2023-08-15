<?php

namespace App\Http\Controllers;
use Google_Client;
use App\Models\Song;

use App\Models\User;
use App\Models\Genre;
use App\Models\Artist;
use GuzzleHttp\Client;
use Google_Service_YouTube;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistController extends Controller
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
        $artists = Artist::orderBy('created_at', 'DESC')->get();
        return view('dashboard.artists.all', compact('artists'));
    }
    public function view($artist_id)
    {
        $artist = Artist::find($artist_id);
        $artists = Artist::all();
        $users = User::all();

        $songs = Song::where('lyrics', '!=','null')->where('artist_id', $artist->artist_id)->get();


        return view('dashboard.artists.view', compact('artist', 'artists', 'users', 'songs'));
    }


    public function frontendView($artist_id)
    {

        $artist = Artist::find($artist_id);
        $artistGenres = $artist->genres; // Assuming you have set up the genres relationship in the Artist model
         $artists = Artist::orderBy('created_at', 'DESC')->get();
        $users = User::all();

        $songs = Song::where('lyrics', '!=','null')->where('artist_id', $artist->artist_id)->get();
        // Find artists with at least one genre in common with the given artist
        $artists = Artist::where('artist_id', '!=', $artist->artist_id)
        ->where('genres',  $artist->genres)
            ->distinct()
            ->take(6)
            ->get();


        return view('frontend.artists.view', compact('artist', 'artists', 'users', 'songs','artists'));
    }

    // public function import(Request $request)
    // {
    //     // Validate the form input
    //     $request->validate([
    //         'artist_id' => 'required',
    //         'album' => 'nullable',
    //     ]);

    //     // Set up Guzzle HTTP client
    //     $client = new Client();

    //     // Get Spotify client ID and client secret from configuration
    //     $clientId = env('SPOTIFY_CLIENT_ID');
    //     $clientSecret = env('SPOTIFY_CLIENT_SECRET');

    //     // Get the access token
    //     $accessToken = $this->getAccessToken($clientId, $clientSecret);

    //     // Spotify API endpoint to fetch a specific artist
    //     $artistId = $request->input('artist_id');
    //     $endpoint = 'https://api.spotify.com/v1/artists/' . $artistId;

    //     // Spotify API request headers
    //     $headers = [
    //         'Authorization' => 'Bearer ' . $accessToken,
    //         'Accept' => 'application/json',
    //     ];

    //     // Make the API request
    //     $response = $client->request('GET', $endpoint, [
    //         'headers' => $headers,
    //     ]);

    //     // Get the response body
    //     $data = json_decode($response->getBody(), true);
    //     // Extract relevant information from the response
    //     $artistName = $data['name'];
    //     $genres = $data['genres'];
    //     $imageUrl = $data['images'][0]['url'];
    //     $artistId = $request->input('artist_id');
    //     $popularity = $data['popularity'];
    //     $spotifyUri = $data['uri'];
    //     // Find or create the artist
    //     $artist = Artist::firstOrCreate([
    //         'name' => $artistName,
    //         'image_url' => $imageUrl,
    //         'artist_id' => $artistId,
    //         'popularity' => $popularity,
    //         'spotify_uri' => $spotifyUri,
    //     ]);

    //     // Make the API request to get the artist's tracks
    //     $tracksEndpoint = 'https://api.spotify.com/v1/artists/' . $artistId . '/top-tracks?country=KE';
    //     $tracksResponse = $client->request('GET', $tracksEndpoint, [
    //         'headers' => $headers,
    //     ]);

    //     // Make the API request to get the artist's albums
    //     $albumsEndpoint = 'https://api.spotify.com/v1/artists/' . $artistId . '/albums?limit=5';
    //     $albumsResponse = $client->request('GET', $albumsEndpoint, [
    //         'headers' => $headers,
    //     ]);

    //     // Get the response body
    //     $albumsData = json_decode($albumsResponse->getBody(), true);

    //     // Extract relevant information from the response
    //     $albums = $albumsData['items'];

    //     // Save the artist's tracks to the songs table

    //     // Get the response body
    //     $tracksData = json_decode($tracksResponse->getBody(), true);

    //     // Extract relevant information from the response
    //     $tracks = $tracksData['tracks'];


    //     // Save the artist's tracks to the songs table

    //     foreach ($tracks as $track) {
    //         $trackId = $track['id'];

    //         // Check if the track already exists in the database
    //         if (Song::where('track_id', $trackId)->exists()) {
    //             continue; // Skip importing the track
    //         }

    //         $name = $track['name'];
    //         $duration = $track['duration_ms'];

    //         // Extract relevant information from the response
    //         $artistName = $track['artists'][0]['name'];
    //         $album = $track['album']['name'];
    //         $spotifyUri = $track['uri'];
    //         $previewUrl = $track['preview_url'];
    //         $artistId = $request->input('artist_id');
    //         $durationMs = $track['duration_ms'];
    //         $popularity = $track['popularity'];
    //         $imageUrls = $track['album']['images'][0]['url'];
    //         $trackName = $track['name'];
    //         $youtubeId = $this->getRelatedYouTubeVideoId($artistName, $trackName);

    //         // Find or create the artist
    //         $artist = Artist::firstOrCreate(['name' => $artistName]);

    //         // Create a new song instance
    //         $song = new Song([
    //             'track_id' => $trackId,
    //             'artist_id' => $artistId,
    //             'name' => $name,
    //             'artist' => $artistName,
    //             'duration' => $duration,
    //             'image_url' => $imageUrls,
    //             'spotify_uri' => $spotifyUri,
    //             'preview_url' => $previewUrl,
    //             'duration_ms' => $durationMs,
    //             'popularity' => $popularity,
    //             'album' => $album,
    //         ]);

    //         // Check if the YouTube video ID is valid and embeddable
    //         if (!$youtubeId) {
    //             return redirect()->back()->withErrors(['youtube_id' => 'Failed to fetch YouTube video ID']);
    //         }

    //         // Get the artist from the database
    //         $artist = Artist::where('name', $artistName)->first();

    //         // Get the artistBio
    //         $artistBio = $this->getArtistBio($artistName);

    //         // Check if the artistBio is available
    //         if (!$artistBio) {
    //             return redirect()->back()->withErrors(['name' => 'Failed to fetch artistBio']);
    //         }

    //         // Get the lyrics
    //         $lyrics = @file_get_contents("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");

    //         // Set the additional song properties
    //         $song->lyrics = isset($lyrics) ? $lyrics : null;
    //         $song->youtube_id = $youtubeId;
    //         $song->genres = implode(';', $genres);

    //         // Save the song details to the database
    //         $song->save();

    //         // Update the artistBio in the artists table
    //         $artist->bio = $artistBio;
    //         $artist->save();

    //         // Save the genres to the genres table
    //         foreach ($genres as $genreName) {
    //             $genre = Genre::firstOrCreate(['name' => $genreName]);
    //             $song->genres()->attach($genre);
    //         }
    //     }

    //     // Redirect back to the form with a success message
    //     return redirect()->back()->with('success', 'Artist imported successfully');
    // }

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
        $clientId = 'c977a9c0addb40fb8ce10dfefd5bbf81';
        $clientSecret = '2ec6a460145f44fc845dfc771f5f701b';

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
        $genres =  implode(',', $data['genres']);
        $imageUrl = $data['images'][0]['url'];
        $artistId = $request->input('artist_id');
        $popularity = $data['popularity'];
        $spotifyUri = $data['uri'];
        $artistAenresString = implode(';', $data['genres']);

        $artistBio = $this->getArtistBio($artistName);

        // Log the artistBio to verify the data
        \Log::info("Artist Bio for '$artistName': " . json_encode($artistBio));

        // Check if the artistBio is available
        if (!$artistBio) {
            return redirect()->back()->withErrors(['name' => 'Failed to fetch artistBio']);
        }


        // Find or create the artist
        $artist = Artist::firstOrCreate([
            'name' => $artistName,
            'bio' => $artistBio,
            'genres' => $artistAenresString,
            'image_url' => $imageUrl,
            'artist_id' => $artistId,
            'popularity' => $popularity,
            'spotify_uri' => $spotifyUri,
        ]);

        // Make the API request to get the artist's tracks
        $tracksEndpoint = 'https://api.spotify.com/v1/artists/' . $artistId . '/top-tracks?country=KE';
        $tracksResponse = $client->request('GET', $tracksEndpoint, [
            'headers' => $headers,
        ]);

        // Get the response body
        $tracksData = json_decode($tracksResponse->getBody(), true);

        // Extract relevant information from the response
        $tracks = $tracksData['tracks'];

        // Save the artist's tracks to the songs table
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
            $youtubeId = $track['album']['name'];
            // $youtubeId = $this->getRelatedYouTubeVideoId($artistName, $trackName);

            // $postYouTubeSong = [
            //     "title" => $trackName,
            //     "artist" => $artistName,
            //     "track_id" =>$trackId
            // ];

            // $songPostRequest = Http::withToken('1bcfc8edab7d10e27fe28bdad55942dc4e2bde59')->post('http://34.240.155.151:8000/converter/convert/', $postYouTubeSong);


             // Find or create the artist
            $artist = Artist::firstOrCreate(['name' => $artistName]);

            // Create a new song instance
            $song = new Song([
                'track_id' => $trackId,
                'artist_id' => $artistId,
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

            // Get the lyrics
            $lyrics = @file_get_contents("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");
            // Get the artistBio

            $artistBio = $this->getArtistBio($artistName);

            // Log the artistBio to verify the data
            \Log::info("Artist Bio for '$artistName': " . json_encode($artistBio));

            // Check if the artistBio is available
            if (!$artistBio) {
                return redirect()->back()->withErrors(['name' => 'Failed to fetch artistBio']);
            }

            // Set the additional song properties
            $song->lyrics = isset($lyrics) ? $lyrics : null;
            $song->youtube_id = $youtubeId;
            // Assuming that $genres is an array of genres, convert it to a string
            $genresString = implode(';', $data['genres']);

            // Save the genres string to the song model
            $song->genres = $genresString;
            $artist->bio = $artistBio;

            // Save the song details to the database
            $song->save();

            // Save the genres to the genres table
            // foreach ($genres as $genreName) {
            //     $genre = Genre::firstOrCreate(['name' => $genreName]);
            //     $song->genres()->attach($genre);
            // }
        }

        // Get related artists from Spotify API
        $relatedArtistsEndpoint = 'https://api.spotify.com/v1/artists/' . $artistId . '/related-artists';
        $relatedArtistsResponse = $client->request('GET', $relatedArtistsEndpoint, [
            'headers' => $headers,
        ]);

        // Get the response body
        $relatedArtistsData = json_decode($relatedArtistsResponse->getBody(), true);

        // Extract relevant information from the response
        $relatedArtists = $relatedArtistsData['artists'];

        // Import related artists and their songs
        foreach ($relatedArtists as $relatedArtist) {
            $relatedArtistId = $relatedArtist['id'];
            $relatedArtistName = $relatedArtist['name'];
            $relatedArtistPopularity = $relatedArtist['popularity'];
            $relgenresString = implode(';', $relatedArtist['genres']);


            $relatedArtistImage = isset($relatedArtist['images'][0]['url']) ? $relatedArtist['images'][0]['url'] : null;

        $relatedArtistBio = $this->getrelatedArtistBio($relatedArtistName);


            // Find or create the related artist
            $relatedArtistModel = Artist::firstOrCreate([
                'name' => $relatedArtistName,
                'image_url' => $relatedArtistImage,
                'bio' => $relatedArtistBio,
                'popularity' => $relatedArtistPopularity,
                'genres' => $relgenresString,
                'artist_id' => $relatedArtistId,
                // Add any other relevant information from the response
            ]);

            // Make the API request to get the related artist's top tracks
            $relatedArtistTopTracksEndpoint = 'https://api.spotify.com/v1/artists/' . $relatedArtistId . '/top-tracks?country=KE';
            $relatedArtistTopTracksResponse = $client->request('GET', $relatedArtistTopTracksEndpoint, [
                'headers' => $headers,
            ]);

            // Get the response body
            $relatedArtistTopTracksData = json_decode($relatedArtistTopTracksResponse->getBody(), true);

            // Extract relevant information from the response
            $relatedArtistTopTracks = $relatedArtistTopTracksData['tracks'];
            $artistBio = $this->getArtistBio($artistName);


            // Log the artistBio to verify the data
            \Log::info("Related Artist Bio for '$artistName': " . json_encode($artistBio));

            // Check if the artistBio is available
            if (!$artistBio) {
                return redirect()->back()->withErrors(['name' => 'Failed to fetch artistBio']);
            }

            // Save the related artist's top tracks to the songs table
            foreach ($relatedArtistTopTracks as $track) {
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
                $youtubeId = $track['album']['name'];
                $artist->bio = $artistBio;
                // $youtubeId = $this->getRelatedYouTubeVideoId($artistName, $trackName);
            // $postYouTubeSong = [
            //     "title" => $trackName,
            //     "artist" => $artistName,
            //     "track_id" =>$trackId
            // ];

            // $songPostRequest = Http::withToken('1bcfc8edab7d10e27fe28bdad55942dc4e2bde59')->post('http://34.240.155.151:8000/converter/convert/', $postYouTubeSong);

            // if($songPostRequest->successful()){

            // }else{
            // }


                // Find or create the artist
                $artist = Artist::firstOrCreate(['name' => $artistName]);

                // Create a new song instance
                $song = new Song([
                    'track_id' => $trackId,
                    'artist_id' => $relatedArtistId, // Use the related artist's ID here
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

                // Get the lyrics
                $lyrics = @file_get_contents("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");
                // Get the artistBio


                // Set the additional song properties
                $song->lyrics = isset($lyrics) ? $lyrics : null;
                $song->youtube_id = $youtubeId;

                // Assuming that $genres is an array of genres, convert it to a string
                $genresString = implode(';', $data['genres']);

                // Save the genres string to the song model
                $song->genres = $genresString;
                // Save the song details to the database
                $song->save();

                // Save the genres to the genres table
                // foreach ($genres as $genreName) {
                //     $genre = Genre::firstOrCreate(['name' => $genreName]);
                //     $song->genres()->attach($genre);
                // }
            }
        }

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Artist and related artists imported successfully');
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
    private function getrelatedArtistBio($relatedArtistName)
    {
        // Set up Guzzle HTTP client
        $client = new Client();

        // Get Last.fm API key from configuration
        $lastFmApiKey = env('LAST_FM_API_KEY');

        // Last.fm API endpoint to fetch artist info
        $endpoint = 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=' . urlencode($relatedArtistName) . '&api_key=' . $lastFmApiKey . '&format=json';

        try {
            // Make the API request to fetch the artist's bio from Last.fm
            $response = $client->request('GET', $endpoint);

            // Get the response body
            $data = json_decode($response->getBody(), true);
            if (isset($data['artist']['bio']['content'])) {
                $relatedArtistBio = $data['artist']['bio']['content'];
            } else {
                $relatedArtistBio = null;
            }
            return $relatedArtistBio;
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error fetching artist bio from Last.fm: ' . $e->getMessage());
            return null;
        }
    }

}
