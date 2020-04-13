<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ServerReport;
use App\Jobs\BetRecord;

class QueueController extends Controller
{
    public function betrecord()
    {
        BetRecord::dispatch();
    }
}
