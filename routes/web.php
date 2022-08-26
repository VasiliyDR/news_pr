<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => '/admin', 'middleware' => ['auth', 'admin']] , function () {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', IndexController::class)->name('admin.main.index');
    });
    Route::group(['namespace' => 'City', 'prefix' => 'cities'], function() {
        Route::get('/', IndexController::class)->name('admin.city.index');
        Route::get('/create', CreateController::class)->name('admin.city.create');
        Route::post('/', StoreController::class)->name('admin.city.store');
        Route::get('/{city}', ShowController::class)->name('admin.city.show');
        Route::patch('/{city}', UpdateController::class)->name('admin.city.update');
        Route::delete('/{city}/delete', DeleteController::class)->name('admin.city.delete');
    });

    Route::group(['namespace' => 'News', 'prefix' => 'news'], function() {
        Route::get('/', IndexController::class)->name('admin.news.index');
        Route::get('/create', CreateController::class)->name('admin.news.create');
        Route::post('/', StoreController::class)->name('admin.news.store');
        Route::get('/{news}', ShowController::class)->name('admin.news.show');
        Route::patch('/{news}', UpdateController::class)->name('admin.news.update');
        Route::delete('/{news}/delete', DeleteController::class)->name('admin.news.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function() {
        Route::get('/', IndexController::class)->name('admin.user.index');
        Route::get('/create', CreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/{user}', ShowController::class)->name('admin.user.show');
        Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}/delete', DeleteController::class)->name('admin.user.delete');
    });
});

Route::group(['namespace' => '\App\Http\Controllers\Main'] , function () {
    Route::get('/', IndexController::class)->name('main.index');
    Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
        Route::get('/', IndexController::class)->name('main.news.index');
        Route::get('/{news}', ShowController::class)->name('main.news.show');
        Route::get('/alike/{news}', AlikeController::class)->name('main.news.alike');
        Route::get('/filter', FilterController::class)->name('main.news.filter');
    });

    Route::group(['namespace' => 'Popular', 'prefix' => 'popular'], function () {
        Route::get('/', IndexController::class)->name('main.popular.index');
    });
    Route::group(['namespace' => 'City', 'prefix'=>'{city}/news'], function() {
        Route::get('/', IndexController::class)->name('main.city.index');
    });
    Route::group(['namespace' => 'Favorite', 'prefix'=>'favorite'], function() {
        Route::get('/', IndexController::class)->name('main.favorite.index');
        Route::post('/{news}', StoreController::class)->name('main.favorite.store');
    });
});


Route::group(['namespace' => '\App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => 'auth'], function() {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function() {
        Route::get('/', IndexController::class)->name('personal.main.index');
    });
    Route::group(['namespace' => 'Relative', 'prefix' => 'favorite'], function() {
        Route::get('/', IndexController::class)->name('personal.favorite.index');
        Route::delete('/{main}', DeleteController::class)->name('personal.favorite.delete');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

