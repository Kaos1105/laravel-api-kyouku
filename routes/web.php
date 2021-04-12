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
})->name('welcome');

Route::get('/verify-token', function () {
    if (! \Illuminate\Support\Facades\Session::has('token_key')) {
        return redirect()->route('welcome');
    }

    return view('verify-token');
})->name('verify-token');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/check-password', 'CampaignController@checkPassword')->name('check-password');

    Route::post('/verify-token', 'CampaignController@checkToken')->name('check-token');

    Route::get('/video-type/{token}', 'CampaignController@showVideo')->name('show-video');

    Route::get('/video/{code}', 'CampaignController@showPopupVideo')->name('show-popup-video');

    Route::post('/LAdCS88T9Dzx', 'LoginController@login')->name('login');

    Route::get('/LAdCS88T9Dzx', 'LoginController@showLoginForm');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', 'UserController@index')->name('index');

        Route::get('/new', 'UserController@new')->name('new');

        Route::get('/preview', 'UserController@preview')->name('preview');

        Route::post('/create', 'UserController@create')->name('create');

        Route::get('/import', 'UserController@import')->name('show-import');

        Route::post('/preview-import-user', 'UserController@previewImportUsers')
             ->name('preview.import');

        Route::post('/import-user', 'UserController@importUsers')->name('import');
    });

    Route::group(['prefix' => 'admins', 'as' => 'admins.', 'middleware' => 'IsSuperAdmin'], function () {
        Route::get('/', 'AdminController@index')->name('index');

        Route::get('/new', 'AdminController@showCreateOrEdit')->name('new');

        Route::get('/change-status', 'AdminController@changeStatus')->name('changeStatus');

        Route::get('/edit/{id}', 'AdminController@showCreateOrEdit')->name('edit');

        Route::post('/create', 'AdminController@createOrEdit')->name('createOrEdit');

        Route::get('/delete/{id}', 'AdminController@delete')->name('delete');
    });
});