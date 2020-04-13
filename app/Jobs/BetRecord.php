<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
    public function handle()
    {
        $game_data = new \App\Games\GameInfo();
        //登入
        $game_data->setData("397ottvBmTnKzSzt1gz7yTrSqAjC3wRsmvaOuwVQ2vaMySRImCvzsTj9qsq$");
        $params = ["app_id"=>"nh38whbUvxzCqSVx0xvO4Df8nBv90dzi4DjFja$$"];
        $api_params = $game_data->getParam($params);
        $token_data = $game_data->param($api_params);
        //取得下注記錄
        $game_data->setData("397ottvBmTnKzSzt1gz7yTrSqAjC3wRsmvaOuwVQ2vaMySRImCvzsTj9qsq$");
        $betrecord_params = ["starttime"=>"2020-04-8 05:20.00","endtime"=>"2020-04-10 23:10.00","page"=>1,"pagelimit"=>10];
        $record_params = $game_data->getParam($betrecord_params);
        $insert_data = $game_data->betRecord($token_data, $record_params);
        $event = $game_data->getbetRecord($insert_data);
    }
}
