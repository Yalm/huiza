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
// Shop routes
Route::get('/', 'Shop\ShopController@index');
Route::get('/product/{product}', 'Shop\ShopController@show');
Route::get('/shop','Shop\ShopController@shop');
Route::get('/about', 'Shop\ShopController@about');
Route::get('/contact', 'Shop\ShopController@contact');
Route::post('/contact', 'Shop\ShopController@sendContact');
Route::get('/shop/product','Shop\ShopController@search');
Route::get('/shop/{name}','Shop\ShopController@searchCategory');

// Shopping Cart Routes
Route::resource('/cart','Shop\ShoppingCartController');
Route::put('/cartEdit','Shop\ShoppingCartController@editCart');

Route::group(['middleware' => 'auth:web'], function ()
{
    // Profile Customer Routes
    Route::prefix('profile')->group(function () 
    {
        Route::get('/','Shop\CustomerController@profile');
        Route::get('/account','Shop\CustomerController@account');
        Route::post('/changePassword','Shop\CustomerController@changePassword')->name('changePassword');
        Route::post('/changeDataCustomer','Shop\CustomerController@changeDataCustomer')->name('changeDataCustomer');
       // Orders Routes
        Route::get('/orders','Shop\OrderController@index');
        Route::get('order/{order}/upload','Shop\OrderController@showUpload');
        Route::get('order/{order}','Shop\OrderController@show');
        Route::post('order/{order}/upload','Shop\OrderController@upload');
        Route::get('order/{order}/canceled','Shop\OrderController@canceled');
        
    });

    Route::get('/checkout', 'Shop\PaymentController@checkout');
    Route::post('/checkout', 'Shop\PaymentController@sucess');
});

Auth::routes();
Route::get('/customer/verify/{token}', 'Auth\RegisterController@verifyCustomer');
Route::get('/resend','Auth\ResendEmailController@resend');
Route::post('/resend','Auth\ResendEmailController@resendEmail')->name('resend');

//Route::get('/home', 'Ecommerce\HomeController@index')->name('home');


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

    Route::group(['middleware' => 'auth:user'], function ()
    {
        Route::resource('/product','Dashboard\ProductController');
        Route::resource('/category','Dashboard\CategoryController');
        Route::resource('/order','Dashboard\OrderController');
        Route::resource('/state','Dashboard\StateController');
        Route::get('/profile','Dashboard\UserController@profile');
    });
});