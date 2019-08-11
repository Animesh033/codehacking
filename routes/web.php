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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('env');
    // $exitCode = Artisan::call('storage:link');
    echo "The time is " . date("h:i:sa");
    echo "<br>";
    echo date_default_timezone_get();
    echo "<br>";
    echo "Exit Code : ".$exitCode;
    return 'Cache and view cleared!';
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function(){
    return view('admin.index');
});
Route::resource('admin/users', 'AdminUsersController');