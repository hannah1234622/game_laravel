<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecreationController extends Controller
{
    public function webData($id) 
    {
        //進入遊戲畫面

        //取得遊戲id
        $game_data = new \App\Games\GameInfo();
        $g_id = $game_data->getGid($id);

        //登入
        $game_data->setData("397ottvBmTnKzSzt1gz7yTrSqAjC3wRsmvaOuwVQ2vaMySRImCvzsTj9qsq$");
        $params = ["app_id"=>"nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$"];
        $login_params = $game_data->getParam($params);
        $token_data = $game_data->login($login_params);
        
        //登入後進入遊戲
        $game_param = ["loginname"=>"455659316","lang"=>"zh-cn","game"=>$g_id];
        $game_params = $game_data->getParam($game_param);
        $url = $game_data->memberLogin($token_data, $game_params);
        header("Location:$url");
        exit();
    }
}