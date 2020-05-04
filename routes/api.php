<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('manage', 'ManageController@manage'); //更改遊戲前台畫面

Route::get('administration', 'AdministrationController@administration'); //管理平台畫面

Route::put('administration', 'AdministrationController@administration'); //管理平台畫面

Route::get('betrecord', function () {
    Artisan::call('record');
    $url = "administration";
    header("Location:$url");
    exit(); 
}); //更新下注記錄功能
