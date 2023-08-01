<?php

use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\VerifyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/register' , RegisterController::class);
Route::apiResource('/login/phone/send' , LoginController::class);
Route::apiResource('/login/userpass' , PasswordController::class);
Route::post('/login/phone/verify' , [PasswordController::class , 'code']);
Route::post('/forget_password' , [PasswordController::class , 'forget']);
Route::get('/update' , [LoginController::class , 'index']);
Route::post('/google' , [LoginController::class , 'google']);

Route::middleware(['throttle:200,1'])->group(function(){

    Route::middleware(['auth:api'])->group(function(){

        Route::post('/event/like' , [EventController::class , 'like']);
        Route::post('/event/dislike' , [EventController::class , 'dislike']);
        Route::apiResource('/client' , ClientController::class);
        Route::post('/client/deleteavatar' , [ClientController::class , 'delete_avatar']);
        Route::apiResource('/event' , EventController::class);
        Route::post('/event_store' , [EventController::class , 'store']);
        Route::apiResource('/setting' , SettingController::class);
        Route::apiResource('/block' , BlockController::class);


        Route::post('/sendEmailVerifyCode' , [VerifyController::class , 'send_email']);
        Route::post('/submitEmailVerifyCode' , [VerifyController::class , 'verify_email']);
        Route::post('/sendMobileVerifyCode' , [VerifyController::class , 'send_phone']);
        Route::post('/SubmitMobileVerifyCode' , [VerifyController::class , 'verify_phone']);


    });


});
