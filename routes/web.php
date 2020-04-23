<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\auth;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('game', 'GameController@front');//顯示前台畫面

Route::get('recreation/{id?}', 'RecreationController@webData'); //進入遊戲畫面

Route::match(['get','put'],'administration', 'AdministrationController@administration'); //管理平台畫面

Route::get('manage', 'ManageController@manage'); //更改遊戲前台畫面

Route::get('betrecord', function () {
    Artisan::call('record');
    $url = "administration";
    header("Location:$url");
    exit(); 
}); //更新下注記錄功能
