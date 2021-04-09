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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
});

//Route untuk role mahasiswa
Route::group(['middleware' => ['auth', 'role:mahasiswa']], function(){
    Route::get('/dashboard/liverequest','App\Http\Controllers\DashboardController@liverequest')->name('dashboard.liverequest');
});
//Route untuk role admin/kaprodi
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/dashboard/createliverequest','App\Http\Controllers\DashboardController@createliverequest')->name('dashboard.createliverequest');
});
//Route pada saat admin menambahkan/membuka mata kuliah
Route::post('/dashboard/store','App\Http\Controllers\DashboardController@store')->name('dashboard.store');

//Route pada saat mahasiswa merequest mata kuliah
Route::post('/dashboard/request','App\Http\Controllers\DashboardController@request')->name('dashboard.request');

Route::get('/dashboard/approve/{id}', 'App\Http\Controllers\DashboardController@approve')->name('dashboard.approve');

Route::get('/dashboard/reject/{id}', 'App\Http\Controllers\DashboardController@reject')->name('dashboard.reject');

Route::get('/dashboard/cancel/{id}', 'App\Http\Controllers\DashboardController@cancel')->name('dashboard.cancel');

Route::get('/dashboard/nameasrequest/{id}', 'App\Http\Controllers\DashboardController@nameasrequest')->name('dashboard.nameasrequest');

Route::group(['middleware' => ['auth', 'role:mahasiswa']], function () {
    Route::get('/dashboard/requestkrs/{id}', 'App\Http\Controllers\DashboardController@requestkrs')->name('dashboard.requestkrs');
});

require __DIR__.'/auth.php';
