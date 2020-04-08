<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/message', function(){
    $message['user'] = 'Phu';
    $message['message'] = 'Hello';

    $success = event(new App\Events\NewMessage($message));
    return $success;
});

Route::get('/view', function(){
	return view('index');
});

Route::get('/chat', 'ChatController@chat')->middleware('auth');
Route::post('/send', 'ChatController@send');
Route::post('/saveToSession', 'ChatController@saveToSession');
Route::get('/getChat', 'ChatController@getChat');
Route::get('/deleteMessage', 'ChatController@deleteMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
