<?php


use Illuminate\Support\Facades\Route;




Route::group(['middleware' => ['auth:admin']], function (){
    Route::get('/', function(){
     return view('admin.dashboard.index');
    })->name('admin.dashboard');

    Route::group(['prefix' => 'admin'], function() {
        Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Admin\LoginController@login') ->name('admin.login.post');
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
    
        Route::get('/', function() {
            return view('admin.dashboard.index');
        });
    });
});