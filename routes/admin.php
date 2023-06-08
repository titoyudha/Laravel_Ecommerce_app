<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\ProductImageController;
use App\Models\AttributeValue;

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');


        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
        Route::post('/settings', [SettingController::class, 'index'])->name('admin.settings.update');

        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
            Route::post('/update', [CategoryController::class, 'update'])->name('admin.categories.update');
            Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');

        });

        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', [AttributeController::class, 'index'])->name('admin.attributes.index');
            Route::get('/create', [AttributeController::class, 'create'])->name('admin.attributes.create');
            Route::post('/store', [AttributeController::class, 'store'])->name('admin.attributes.store');
            Route::get('/{id}/edit', [AttributeController::class, 'edit'])->name('admin.attributes.edit');
            Route::post('/update', [AttributeController::class, 'update'])->name('admin.attributes.update');
            Route::get('/{id}/delete', [AttributeController::class, 'delete'])->name('admin.attributes.delete');

            Route::post('/get-values', [AttributeValue::class, 'getValues']);
            Route::post('/add-values', [AttributeValue::class, 'addValue']);
            Route::post('/update-values', [AttributeValue::class, 'updateValue']);
            Route::post('/delete-values', [AttributeValue::class, 'deleteValue']);
        });

        Route::group(['prefix'  =>   'brands'], function() {

            Route::get('/', [BrandController::class, 'index'])->name('admin.brands.index');
            Route::get('/create', [BrandController::class, 'create'])->name('admin.brands.create');
            Route::post('/store', [BrandController::class, 'store'])->name('admin.brands.store');
            Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
            Route::post('/update', [BrandController::class, 'update'])->name('admin.brands.update');
            Route::get('/{id}/delete', [BrandController::class, 'delete'])->name('admin.brands.delete');

        });

        Route::group(['prefix' => 'products'], function () {

           Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
           Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
           Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
           Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
           Route::post('/update', [ProductController::class, 'update'])->name('admin.products.update');

           Route::post('images/upload', [ProductImageController::class, 'upload'])->name('admin.products.images.upload');
           Route::get('images/{id}/delete', [ProductImageController::class, 'delete'])->name('admin.products.images.delete');

           Route::get('attributes/load', [ProductAttributeController::class, 'load']);
           Route::post('attributes', [ProductAttributeController::class, 'productAttribute']);
           Route::post('attributes/values', [ProductAttributeController::class, 'loadValues']);
           Route::post('attributes/add', [ProductAttributeController::class, 'addAttribute']);
           Route::post('attributes/delete', [ProductAttributeController::class, 'deleteAttribute']);

        });

        Route::group(['prefix' => 'orders'], function () {
           Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
           Route::get('/{order}/show', [OrderController::class, 'show'])->name('admin.orders.show');
        });
    });
});
