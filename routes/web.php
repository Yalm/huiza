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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth:web'], function() 
{
});

Route::get('/home', 'Ecommerce\HomeController@index')->name('home');


Route::prefix('admin')->group(function () 
{
    Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
    Route::get('/','Dashboard\DashboardController@index')->name('user.dashboard');    
    Route::post('/logout', 'Auth\UserLoginController@logout')->name('user.logout');

    // Password reset routes
    Route::post('/password/email','Auth\UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('/password/reset','Auth\UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('/password/reset','Auth\UserResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\UserResetPasswordController@showResetForm')->name('user.password.reset');
});