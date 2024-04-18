<?php

use Illuminate\Support\Facades\Route;
    use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/request', function () {
    return view('request');
})->name('request');

Route::post('/request', [\App\Http\Controllers\RequestController::class, 'create']);

Route::group([
    'prefix' => 'lk'
], function(){
    Route::get('/', function(){
        return view('lk');
    })->name('lk')->middleware('auth');

    Route::get('login', function(){
       return view('login');
    })->name('lk.login');

    Route::get('profile', function(){
        return view('profile');
    })->name('lk.profile')->middleware('auth');

    Route::get('stat', function(){
        return view('lk_stat', ['gr' => json_encode(\App\Http\Controllers\RequestController::getStat())]);
    })->name('lk.stat')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class]);

    Route::post('profile', [\App\Http\Controllers\AuthController::class, 'changePassword'])->middleware('auth');

    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('lk.logout');

    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

    Route::group([
        'prefix' => 'requests'
    ], function(){
        Route::get('/', function(){
            return "Заявки пользователей";
        })->name('lk.requests');

        Route::get('/{uuid}', function($uuid){

            $req = \App\Models\Request::where('uuid', $uuid)->firstOrFail();

            return view('lk_request', ['req' => $req]);
        })->name('lk.request.once')->where(['uuid' => '[A-z0-9\-]+'])->middleware(\App\Http\Middleware\AdminMiddleware::class);

        Route::post('/{uuid}', [\App\Http\Controllers\RequestController::class, 'update'])->where(['uuid' => '[A-z0-9\-]+'])->middleware(\App\Http\Middleware\AdminMiddleware::class);

    });
});
