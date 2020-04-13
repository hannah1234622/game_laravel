<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecreationController extends Controller
{
    public function webData($id) 
    {
        //進入遊戲畫面
        //string參數轉換為int
        $a = (int) $id;
        //取得遊戲id
        $game_data = new \App\Games\GameInfo();
        $g_id = $game_data->getGid($a);
        //登入
        $game_data->setData("397ottvBmTnKzSzt1gz7yTrSqAjC3wRsmvaOuwVQ2vaMySRImCvzsTj9qsq$");
        $params = ["app_id"=>"nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$"];
        $api_params = $game_data->getParam($params);
        $token_data = $game_data->param($api_params);
        //登入後進入遊戲
        $game_params = ["loginname"=>"455659316","lang"=>"zh-cn","game"=>$g_id];
        $login_params = $game_data->getParam($game_params);
        $url = $game_data->memberLogin($token_data, $login_params);
        $game_data->redirect($url);
    }
}