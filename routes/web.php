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
})->middleware('guest');

Route::get('/survey', 'App\Http\Controllers\SurveyController@index')->middleware('guest');
Route::get('/survey/submit', 'App\Http\Controllers\SurveyController@success')->name('survey.success')->middleware('guest');
Route::post('/survey', 'App\Http\Controllers\SurveyController@submit')->name('survey.submit')->middleware('guest');

Route::post('/login', 'App\Http\Controllers\AuthController@authenticate')->name('post.login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::prefix('admin')->group(function() {
	Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('index')->middleware('user.session');;
});
