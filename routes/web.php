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
    Route::get('/dashboard/requestpermahasiswa','App\Http\Controllers\DashboardController@requestpermahasiswa')->name('dashboard.requestpermahasiswa');

});
//Route pada saat admin menambahkan/membuka mata kuliah
Route::post('/dashboard/store','App\Http\Controllers\DashboardController@store')->name('dashboard.store');

//Route pada saat mahasiswa merequest mata kuliah
Route::post('/dashboard/request','App\Http\Controllers\DashboardController@request')->name('dashboard.request');

Route::post('/dashboard/request2/{id}','App\Http\Controllers\DashboardController@request2')->name('dashboard.request2');


Route::get('/dashboard/approve/{id}', 'App\Http\Controllers\DashboardController@approve')->name('dashboard.approve');

Route::get('/dashboard/reject/{id}', 'App\Http\Controllers\DashboardController@reject')->name('dashboard.reject');

Route::get('/dashboard/cancel/{id}', 'App\Http\Controllers\DashboardController@cancel')->name('dashboard.cancel');

Route::get('/dashboard/nameasrequest/{id}', 'App\Http\Controllers\DashboardController@nameasrequest')->name('dashboard.nameasrequest');

Route::get('/dashboard/mkasrequest/{k_mk}', 'App\Http\Controllers\DashboardController@mkasrequest')->name('dashboard.mkasrequest');

Route::group(['middleware' => ['auth', 'role:mahasiswa']], function () {
    Route::get('/dashboard/requestkrs/{id}', 'App\Http\Controllers\DashboardController@requestkrs')->name('dashboard.requestkrs');
    Route::get('/dashboard/requestagain/{id}', 'App\Http\Controllers\DashboardController@requestagain')->name('dashboard.requestagain');
});

require __DIR__.'/auth.php';
