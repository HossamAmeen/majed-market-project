<?php
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->group(function(){
    Auth::routes();

    Route::any('sendToken' , 'BackEnd\ConfigrationController@sendToken')->name('forget.password');
    Route::any('paswordreset/{id}/{token}' , 'BackEnd\ConfigrationController@paswordreset');
    // Route::post('login', 'BackEnd\UserController@login');
    Route::middleware('auth')->namespace('BackEnd')->group(function () {



        Route::get('/', 'ConfigrationController@index');
        Route::get('/x', 'ConfigrationController@getOrder');
        Route::get('/a', 'ConfigrationController@allOrder');
        Route::get('/m', 'ConfigrationController@monthOrder');
        Route::get('/y', 'ConfigrationController@yearOrder');

        Route::resource('configrations', 'ConfigrationController');
        Route::resource('users', 'UserController');
        Route::any('edit-account', 'UserController@editAccount')->name('edit-account');
        Route::resource('products', 'ProductController');
        Route::resource('orders', 'OrderController');
        Route::resource('bills', 'BillController');


    });
});

Route::get('/', function ()
{
    
    return redirect()->route('admin.users');
    
});