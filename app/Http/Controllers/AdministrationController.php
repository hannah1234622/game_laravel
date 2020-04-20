<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function administration(Request $request) 
    {
        //管理平台畫面
        $mode = $request->all();
        if (isset($mode['date']) && $mode['time']!=="0") {
            $time = $mode['time'];
            $date = $mode['date'];
            $record = \App\Model\Record::where('CreateTime', 'LIKE', '%'.$date." ".$time.'%')->get();
            return view('administration', compact('record', 'time', 'date'));            
        }elseif (isset($mode['_token'])) {
            $game_data = new \App\Games\GameInfo();
            $game_data->getMode($mode);
            return view('administration');
        }
        echo "<script>alert('請重新選擇查詢注單');</script>"; 
        return view('administration');

    }
}
