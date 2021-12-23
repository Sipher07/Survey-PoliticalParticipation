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

Route::get('/quiz', 'App\Http\Controllers\SurveyController@index')->middleware('guest');
Route::get('/quiz/result', 'App\Http\Controllers\SurveyController@success')->name('survey.result')->middleware('guest');
Route::post('/quiz/submit', 'App\Http\Controllers\SurveyController@submit')->name('survey.submit')->middleware('guest');

Route::post('/login', 'App\Http\Controllers\AuthController@authenticate')->name('post.login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::prefix('admin')->group(function() {
	Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('index')->middleware('user.session');
	Route::get('/participants', 'App\Http\Controllers\DashboardController@participants')->name('participants')->middleware('user.session');
	Route::get('/analysis', 'App\Http\Controllers\DashboardController@analysis')->name('analysis')->middleware('user.session');
	Route::get('/analysis/cluster/{k}/{col1}/{col2}', 'App\Http\Controllers\DashboardController@cluster')->name('analysis.cluster')->middleware('user.session');
});
