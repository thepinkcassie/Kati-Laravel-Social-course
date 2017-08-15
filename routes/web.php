<?php

use App\Events\EventTrigger;
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

Route::get('/', function (){
    return view('welcome');
});


Route::get('/chat', function(){
    return view('chat');
});

Route::get('/alertBox', function (){
    return view('eventListener');
});

Route::get('/fireEvent', function(){
    event(new eventTrigger());
});


Route::get('sendMail', 'MailController@index');
/* USE TO TEST FEATURES OR CODES
DO NOT MAKE PUBLIC*/
Route::get('/test', function () {
    return view('test');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
    
    Route::get('/profile/{slug}',[
       'uses' => 'ProfilesController@index',
       'as' => 'profile'
    ]);

    Route::get('/profile/edit/profile', [
        'uses'=> 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('/profile/update/profile', [
        'uses'=> 'ProfilesController@update',
        'as' => 'profile.update'
    ]);

    Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendshipsController@check',
        'as' => 'check'
    ]);

    Route::get('/add_friend/{id}', [
        'uses' => 'FriendshipsController@add_friend',
        'as' => 'add_friend'
    ]);

    Route::get('/accept_friend/{id}', [
        'uses' => 'FriendshipsController@accept_friend',
        'as' => 'accept_friend'
    ]);

});