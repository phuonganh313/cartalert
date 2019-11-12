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


Route::post('/setting/get',['as'=>'setting.get','uses'=>'SettingController@getSettingsByDomain']);

Route::post('/setting/getfile',['middleware' => 'throttler:50,30', 'as'=>'setting.getfile', 'uses'=>'SettingController@getFileSettingsByDomain']);

Route::post('/uninstall',['as'=>'uninstall', 'uses'=>'AuthController@uninstall']);
