<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ResultController;

Route::get('/', [UserController::class, 'login_form'])->name('login_form');
Route::post('login', [UserController::class, 'login'])->name('login');

Route::group(['middleware' => 'user_auth'], function(){
    Route::group(['middleware' => 'prevent-back-history'],function(){
        Route::get('mcq', [UserController::class, 'mcq'])->name('mcq');
        Route::post('/store-answer',[AnswerController::class,'store'])->name('store.answer');
        Route::get('/results',[ResultController::class,'index'])->name('results');
        Route::get('logout',[UserController::class,'logout'])->name('logout');
    });


});


