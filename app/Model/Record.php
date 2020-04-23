<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $connection = 'game';
    protected $table = 'record';
    public $timestamps = false;
    public $fillable = [
        'RecordSn', 'LoginName', 'AccountType', 'GameSerialID', 'CreateTime',
        'ValueType', 'Reason', 'WinAmount', 'GameID', 'BetAmount', 'Commissionable',
        'GameClientIP', 'DeviceInfo', 'GrandJPContribution', 'MajorJPContribution', 
        'MinorJPContribution', 'MiniJPContribution', 'JPBet'
    ];
}