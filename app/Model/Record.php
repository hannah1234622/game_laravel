<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $connection = 'game';
    protected $table = 'record';
    protected $primaryKey = 'RecordSn';
    const CREATED_AT = 'insert_at';
    public $fillable = [
        'RecordSn', 'LoginName', 'AccountType', 'GameSerialID', 'CreateTime',
        'ValueType', 'Reason', 'WinAmount', 'GameID', 'BetAmount', 'Commissionable',
        'GameClientIP', 'DeviceInfo', 'GrandJPContribution', 'MajorJPContribution', 
        'MinorJPContribution', 'MiniJPContribution', 'JPBet'
    ];
}