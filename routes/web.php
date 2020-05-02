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
    return view('frontend.index');
});

Auth::routes([]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories', 'FrontendController@category')->name('category');

Route::resource('discussion','DiscussionController');
Route::resource('discussion/{discussion}/replies','RepliesController');

Route::post('discussion/{discussion}/reply/{reply}','RepliesController@reply')->name('best.reply');
Route::get('users/notifications/',[\App\Http\Controllers\UserController::class,'notifications'])->name('notifcations');
