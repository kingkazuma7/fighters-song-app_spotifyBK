<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class PlayerController extends Controller
{
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->clientId = env('SPOTIFY_CLIENT_ID');
        $this->clientSecret = env('SPOTIFY_CLIENT_SECRET');
    }

    public function index() {
        // JSONファイルから選手データを読み込む
        $playersData = json_decode(File::get(resource_path('data/players.json')), true);
    
        // Spotify API から入場曲情報を取得
        foreach ($playersData as &$player) {
            $entranceSong = $player['entranceSong'];
    
            // Get the Spotify access token
            $accessToken = $this->getSpotifyAccessToken();
            
            // Spotify API を呼び出して入場曲情報を取得
            $spotifyData = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://api.spotify.com/v1/search', [
                'q' => $entranceSong,
                'type' => 'track'
            ])->json();
            
            // If tracks were found, get the Spotify URL
            if(!empty($spotifyData['tracks']['items'])) {
                $firstTrack = $spotifyData['tracks']['items'][0];

                // Get the Spotify URL and add it to the player data
                $player['spotifyUrl'] = $firstTrack['external_urls']['spotify'];
            }
        }
    
        return view('players.index', ['players' => $playersData]);
    }

    private function getSpotifyAccessToken() {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);

        if ($response->successful() && isset($response['access_token'])) {
            return $response['access_token'];
        }

        // Handle the case where the access token is not returned
        // You should replace this with your own error handling logic
        throw new \Exception('Failed to get Spotify access token: ' . $response->body());
    }

    
}
