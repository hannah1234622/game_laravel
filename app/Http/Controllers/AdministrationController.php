<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function administration(Request $request) 
    {
        //管理平台畫面
        $mode=$request->all();
        $game_data = new \App\Games\GameInfo();
        $game_data->getMode($mode);
        return view('administration');
    }
}
