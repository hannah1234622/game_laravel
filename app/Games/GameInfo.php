<?php
namespace App\Games;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class GameInfo{

    private $platform_secret;

    //取得遊戲id
    public function getGid($id)
    {
        $rows = \App\Model\Game::where('id', 'LIKE', $id)
                    ->get();
        foreach ($rows as $row) {
            $g_id = $row->g_id;
        }
        return $g_id;
    }

    //產生物件變數
    public function setData($sign)
    {
        $this -> platform_secret = $sign;
    }

    //產生驗證api
    public function getParam($params)
    {
        $json_params = json_encode($params);
        $data = $json_params;
        $api_params = [
            'timestamp'=> time(),
            'data' => $data,
            'sign' => hash_hmac('sha1', $data, $this->platform_secret)
        ];
        return $api_params;
    }

    //curl出login的api資料
    public function param($api_params)
    {
        $curl = new \Curl \Curl();
        $curl -> setHeader('contentType','application/json');
        $curl -> post('https://api-stag.acewin-demo.com/i17gameaceapicenter/nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$/login', $api_params);
        if ($curl -> error) {
            $err = $curl -> error_code;
            $curl -> close();
            throw new \App\Exceptions\GameException($err);
        }
        $response = $curl -> response;
        $token = json_decode($response, true);
        $curl -> close();
        return $token['token'];
    }

    //curl出進入遊戲的api資料
    public function memberLogin($token_data,$login_params)
    {
        $curl = new \Curl \Curl();
        $curl -> setHeader('contentType','application/json');
        $curl -> etHeader('token',$token_data);
        $curl -> post('https://api-stag.acewin-demo.com/i17gameaceapicenter/nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$/member/login', $login_params);
        if ($curl -> error) {
            $err = $curl -> error_code;
            $curl -> close();
            throw new \App\Exceptions\GameException($err);
        }
        $response = $curl -> response;
        $url = json_decode($response, true);
        $curl -> close();
        return $url['url'];
    }

    //重導向
    public function redirect($url)
    {
        header("Location:$url");
        exit();
    }

    //資料更新
    public function getMode($mode)
    {
        foreach ($mode as $key => $value) {
            $mode_value = (int) $value;
            $update_rows = DB::table('game_table')
                -> where('name', '=', $key)
                -> update(['mode' => $mode_value]);
        }
    }

    //curl出下注記錄的api資料
    public function betRecord($token_data,$record_params)
    {
        $curl = new \Curl \Curl();
        $curl -> setHeader('contentType','application/json');
        $curl -> setHeader('token',$token_data);
        $curl -> post('https://api-stag.acewin-demo.com/i17gameaceapicenter/nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$/record/betrecord/bytime',$record_params);
        if ($curl -> error) {
            $err = $curl -> error_code;
            $curl -> close();
            throw new \App\Exceptions\GameException($err);
        }
        $response = $curl -> response;
        $data = json_decode($response, true);
        $curl -> close();
        return $data['Data'];
    }

    //修改下注資料型態
    public function datetime($insert_data)
    {
        for ($i=0; $i < count($insert_data)-1; $i++) { 
            $date_change = strtotime($insert_data[$i]['CreateTime']);
            $datetime = (date('Y-m-d H', $date_change)); 
            unset($insert_data[$i]['CreateTime']);
            $insert_data[$i]['CreateTime'] = $datetime;
        }
        return $insert_data;
    }


    //資料新增
    public function getbetRecord($insert_data)
    {
        for ($i=0; $i < count($insert_data)-1; $i++) {
            $exist = DB::table('record')->where('RecordSn', $insert_data[$i]['RecordSn']) -> exists();
            if ($exist) {
                $update_rows = DB::table('record') -> where('RecordSn', $insert_data[$i]['RecordSn']) ->
                update(array(
                    'RecordSn' => $insert_data[$i]['RecordSn'],
                    'LoginName' => $insert_data[$i]['LoginName'],
                    'AccountType' => $insert_data[$i]['AccountType'],
                    'GameSerialID' => $insert_data[$i]['GameSerialID'],
                    'CreateTime' => $insert_data[$i]['CreateTime'],
                    'ValueType' => $insert_data[$i]['ValueType'],
                    'Reason' => $insert_data[$i]['Reason'],
                    'WinAmount' => $insert_data[$i]['WinAmount'],
                    'GameID' => $insert_data[$i]['GameID'],
                    'BetAmount' => $insert_data[$i]['BetAmount'],
                    'Commissionable' => $insert_data[$i]['Commissionable'],
                    'GameClientIP' => $insert_data[$i]['GameClientIP'],
                    'DeviceInfo' => $insert_data[$i]['DeviceInfo'],
                    'GrandJPContribution' => $insert_data[$i]['GrandJPContribution'],
                    'MajorJPContribution' => $insert_data[$i]['MajorJPContribution'],
                    'MinorJPContribution' => $insert_data[$i]['MinorJPContribution'],
                    'MiniJPContribution' => $insert_data[$i]['MiniJPContribution'],
                    'JPBet' => $insert_data[$i]['JPBet'],
                )); 
            }else {
                $add_rows = DB::table('record')->insert([
                    'RecordSn' => $insert_data[$i]['RecordSn'],
                    'LoginName' => $insert_data[$i]['LoginName'],
                    'AccountType' => $insert_data[$i]['AccountType'],
                    'GameSerialID' => $insert_data[$i]['GameSerialID'],
                    'CreateTime' => $insert_data[$i]['CreateTime'],
                    'ValueType' => $insert_data[$i]['ValueType'],
                    'Reason' => $insert_data[$i]['Reason'],
                    'WinAmount' => $insert_data[$i]['WinAmount'],
                    'GameID' => $insert_data[$i]['GameID'],
                    'BetAmount' => $insert_data[$i]['BetAmount'],
                    'Commissionable' => $insert_data[$i]['Commissionable'],
                    'GameClientIP' => $insert_data[$i]['GameClientIP'],
                    'DeviceInfo' => $insert_data[$i]['DeviceInfo'],
                    'GrandJPContribution' => $insert_data[$i]['GrandJPContribution'],
                    'MajorJPContribution' => $insert_data[$i]['MajorJPContribution'],
                    'MinorJPContribution' => $insert_data[$i]['MinorJPContribution'],
                    'MiniJPContribution' => $insert_data[$i]['MiniJPContribution'],
                    'JPBet' => $insert_data[$i]['JPBet'],
                ]);               
            }
        }   
    }
}