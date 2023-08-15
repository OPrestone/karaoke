<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GenreController extends Controller
{

     
    public function seedGenres()
    {
        // Set up Guzzle HTTP client
        $client = new Client();

        // Get Spotify client ID and client secret from configuration
        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');

        // Get the access token
        $accessToken = $this->getAccessToken($clientId, $clientSecret);

        // Spotify API endpoint to fetch available genre seeds
        $endpoint = 'https://api.spotify.com/v1/recommendations/available-genre-seeds';

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

        // Extract the genre seeds
        $genreSeeds = $data['genres'];

        // Seed the genres in your database
        // Your code logic to seed genres in the database goes here
        
        // Example: Saving genres to the database using Eloquent
        foreach ($genreSeeds as $genre) {
            \App\Models\Genre::create([
                'name' => $genre,
            ]);
        }

        return 'Genres seeded successfully';
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
}
