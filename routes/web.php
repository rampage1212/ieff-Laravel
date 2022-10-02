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

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::post('/vote','App\Http\Controllers\HomeController@vote')->name('vote');

Route::get('/governance', 'App\Http\Controllers\GovernanceController@index');
Route::post('/governancevote','App\Http\Controllers\GovernanceController@vote')->name('governancevote');

Route::get('/license', function () {
    return view('license');
});

Route::get('/ieff', 'App\Http\Controllers\IeffController@index');

Route::get('/transfer-window', 'App\Http\Controllers\TransferwindowController@index');

Route::get('/members', 'App\Http\Controllers\MemberController@index');
Route::post('/searchmembers','App\Http\Controllers\MemberController@searchMembers')->name('searchmembers');

Route::get('/sverige', 'App\Http\Controllers\MembernationsController@index');

Route::get('/player-card/{slug}', 'App\Http\Controllers\PlayercardController@index');

Route::get('/e-football', 'App\Http\Controllers\BlogController@index');
Route::get('/e-football/{slug}', 'App\Http\Controllers\BlogController@getSingle');
Route::get('/sverige/{slug}', 'App\Http\Controllers\BlogController@getSingle');

Route::get('/rankings', 'App\Http\Controllers\RankingController@index');


Route::get('/terms', function () {
    return view('terms');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/contact', 'App\Http\Controllers\ContactController@index');
Route::post('/sendmessage','App\Http\Controllers\ContactController@sendMessage')->name('sendmessage');

Route::get('/authentication', function () {
    return view('auth.authentication');
});


Auth::routes();

Route::resource('/profile','App\Http\Controllers\ProfileController')->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/create_paypal_plan', 'App\Http\Controllers\PayController@create_plan');
Route::post('/webhook', 'App\Http\Controllers\PaypalController@paypalWebhook');
Route::get('/subscribe/paypal', 'App\Http\Controllers\PaypalController@paypalRedirect')->name('paypal.redirect');
Route::get('/subscribe/paypal/return', 'App\Http\Controllers\PaypalController@paypalReturn')->name('paypal.return');

Route::get('/subscribe', function () {
    return view('subscribe');
})->middleware('auth');

Route::get('/test', ['as' => 'messages', 'uses' => 'App\Http\Controllers\MessagesController@index']);

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'App\Http\Controllers\MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'App\Http\Controllers\MessagesController@create']);
    Route::get('create/{userid}', ['as' => 'messages.direct', 'uses' => 'App\Http\Controllers\MessagesController@direct']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'App\Http\Controllers\MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'App\Http\Controllers\MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'App\Http\Controllers\MessagesController@update']);
});