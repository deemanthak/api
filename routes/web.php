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

use App\Events\TaskEvent;
use App\Notifications\TaskCompleted;
use App\User;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {

//    User::find(1)->notify(new TaskCompleted);
    $users = User::all();
    Notification::send($users,new TaskCompleted($users));

//    Notification::route('mail', 'taylor@laravel.com')
////        ->route('nexmo', '5555555555')
//        ->notify(new TaskCompleted());


    return view('welcome');
});


Route::get('event',function()
{
//    return 'ss';
   event(new TaskEvent('hey how art you'));
});


Route::get('listen', function () {
    return view('listenBroadcast');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
