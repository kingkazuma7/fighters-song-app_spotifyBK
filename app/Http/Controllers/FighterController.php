<?php

namespace App\Http\Controllers;

use App\Models\Fighter;
use Illuminate\Http\Request;

class FighterController extends Controller
{
    // createメソッド
    public function create()
    {
        return view('fighters.create');
    }
    
    // store メソッド ... db保存
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'entry_song' => 'required',
            'artist' => 'required',
        ]);
        
        Fighter::create($request->all());
        
        return redirect()->route('fighters.index')
            ->with('success', 'ファイターが登録されました。');
    }
    
    public function index()
    {
        $fighters = Fighter::all();
        return view('fighters.index', compact('fighters'));
    }
}
