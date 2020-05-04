<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use DateTime;

class BetRecord implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
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
        $this->betrecord_params = ["starttime" => "2020-04-9 00:00.00", "endtime" => "2020-05-15 00:00.00", "page" => 1, "pagelimit" => 100];
        if (isset($manage['pagelimit']) && $manage['start_date']!=null && $manage['end_date']!=null) {
            $start_date = new DateTime($manage['start_date'].' '.$manage['start_time'].":00");
            $start_time = $start_date -> format('Y-m-d H:i.s');
            $end_date = new DateTime($manage['end_date'].' '.$manage['end_time'].":00");
            $end_time = $end_date -> format('Y-m-d H:i.s'); 
            $betrecord_params = ["starttime" => $start_time, "endtime" => $end_time, "page" => 1, "pagelimit" => (int)$manage['pagelimit']];         
        }
        $api_params = $game_data->getParam($this->betrecord_params);
        $insert_data = $game_data->betRecord($token_data, $api_params);
        $record_data = $game_data->datetime($insert_data);
        $game_data->getbetRecord($record_data);
    }
}
