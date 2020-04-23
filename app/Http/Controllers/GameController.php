<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function front()
    {
        //顯示前台畫面
        $games = \App\Model\Game::where('mode', 1)
                    ->orderBy('id', 'asc')
                    ->get();
        return view('game',compact('games'));
    }
}
