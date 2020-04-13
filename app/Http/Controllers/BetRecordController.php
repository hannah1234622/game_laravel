<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BetRecordController extends Controller
{
    public function betrecord() 
    {
        //更新下注記錄功能
        $game_data = new \App\Games\GameInfo();
        //登入
        $game_data->setData("397ottvBmTnKzSzt1gz7yTrSqAjC3wRsmvaOuwVQ2vaMySRImCvzsTj9qsq$");
        $params = ["app_id"=>"nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$"];
        $api_params = $game_data->getParam($params);
        $token_data = $game_data->param($api_params);
        //取得下注記錄
        $game_data->setData("397ottvBmTnKzSzt1gz7yTrSqAjC3wRsmvaOuwVQ2vaMySRImCvzsTj9qsq$");
        $betrecord_params = ["starttime"=>"2020-04-8 05:20.00","endtime"=>"2020-04-15 23:10.00","page"=>1,"pagelimit"=>10];
        $record_params = $game_data->getParam($betrecord_params);
        $insert_data = $game_data->betRecord($token_data, $record_params);
        $game_data->getbetRecord($insert_data);
        $url = "administration";
        $game_data->redirect($url);
    }
}
