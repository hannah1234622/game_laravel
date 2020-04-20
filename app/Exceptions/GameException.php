<?php

namespace App\Exceptions;

use Exception;

class GameException extends Exception
{
    public function report()
    {
        //執行異常時的處理程序
        echo $this->getMessage();
        exit();
    }
}
