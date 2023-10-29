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
    
        return view('players.index', ['players' => $playersData]);
    }
}
