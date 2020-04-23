<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BetRecordController extends Controller
{
    public function betrecord(Request $request)
    {
        //更新下注記錄功能
        $manage = $request->all();
        $game_data = new \App\Games\GameInfo();

        //登入
        $game_data->setData("397ottvBmTnKzSzt1gz7yTrSqAjC3wRsmvaOuwVQ2vaMySRImCvzsTj9qsq$");
        $params = ["app_id"=>"nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$"];
        $api_params = $game_data->getParam($params);
        $token_data = $game_data->login($api_params);

        //取得下注記錄
        $betrecord_params = ["starttime" => "2020-04-9 00:00.00", "endtime" => "2020-05-15 00:00.00", "page" => 1, "pagelimit" => 100];
        if (isset($manage['pagelimit']) && $manage['starttime']!=null && $manage['endtime']!=null) {
            $betrecord_params = ["starttime" => $manage['starttime'] ." 00:00.00", "endtime" => $manage['endtime'] ." 00:00.00", "page" => 1, "pagelimit" => (int)$manage['pagelimit']];         
        }
        $api_params = $game_data->getParam($betrecord_params);
        $insert_data = $game_data->betRecord($token_data, $api_params);
        $record_data = $game_data->datetime($insert_data);
        $game_data->getbetRecord($record_data);
    }
}
