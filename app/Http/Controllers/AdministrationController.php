<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function administration(Request $request) 
    {
        //管理平台畫面
        $manage = $request->all();
        if (isset($manage['time']) && $manage['date']!=null && $manage['time']!=="0") {
            $date = $manage['date'];
            $time = $manage['time'];
            $records = \App\Model\Record::whereDate('CreateTime', $date)->whereTime('CreateTime', '>=', $time .':00:00')->whereTime('CreateTime', '<=', $time .':59:59')->get();
            return view('administration', compact('records', 'time', 'date'));                               
        }
        $game_data = new \App\Games\GameInfo();
        $game_data->updateMode($manage);
        return view('administration');
    }
}
