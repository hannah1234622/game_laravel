<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $connection = 'game';
    protected $table = 'game_table';
}
