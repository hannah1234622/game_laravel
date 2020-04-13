<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Games;

class Record extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'record';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新注單資料';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $betrecord_data = new \App\Http\Controllers\QueueController();
        $betrecord_data = $betrecord_data->betrecord();
    }
}