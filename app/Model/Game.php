<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $connection = 'game';
    protected $table = 'game_table';
    public $timestamps = false;
}
