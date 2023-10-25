<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class PlayerController extends Controller
{
    public function index() {
        // JSONファイルから選手データを読み込む
        $playersData = json_decode(File::get(resource_path('data/players.json')), true);
    
        // Spotify API から入場曲情報を取得
        foreach ($playersData as &$player) {
            $entranceSong = $player['entranceSong'];  // キーを "entranceSong" に修正
    
            // Spotify API を呼び出して入場曲情報を取得（この部分は実際のSpotify API呼び出しになります）
            $spotifyResponse = Http::get('https://api.spotify.com/v1/search', [
                'q' => $entranceSong,
                'type' => 'track'
            ]);
            
        }
    
        return view('players.index', ['players' => $playersData]);
    }
}
