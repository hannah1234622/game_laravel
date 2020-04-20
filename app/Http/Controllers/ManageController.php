<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function manage()
    {
        //更改遊戲前台畫面
        $rows = \App\Model\Game::all();
        return view('manage', compact('rows'));
    }
}
