<?php

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


Route::match(
    ['get', 'post'],
    '/authenticate',
    'AuthController@authenticate'
)
->name('authenticate');
// Route::get('/', function () {
//     return redirect('/login');
// });

Route::group(['middleware' => 'localization', 'prefix' => Session::get('locale')], function() {
    Route::post('/lang', [
        'as' => 'switchLang',
        'uses' => 'LangController@switchLang',
    ]);
    Route::get('/create/{domain}',['as'=>'setting.create','uses'=>'SettingController@create']);
    Route::post('/store/{domain}',['as'=>'setting.store','uses'=>'SettingController@store']);
});
