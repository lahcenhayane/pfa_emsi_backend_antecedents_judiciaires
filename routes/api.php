<?php

use App\Http\Controllers\CriminalController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::post('/login', [UserController::class,'login'])->middleware('cors');

Route::group(['middleware' => 'auth.jwt', 'cors'], function () {
    Route::post('/register', [UserController::class,'register']);
    Route::get('/index', [UserController::class,'index']);
    Route::get('/info', [UserController::class,'info']);
    Route::get('/countgp', [UserController::class,'countGP']);
    Route::delete('/destroy/{id}', [UserController::class,'destroy']);
    Route::get('/findUser/{id}', [UserController::class,'find']);
    Route::put('/update', [UserController::class,'update']);
    Route::get('logout', 'ApiController@logout');
    Route::get('/countcriminal', [UserController::class,'countcriminal']);


    Route::resource('/criminals', CriminalController::class);
    Route::resource('/fichiers',FichierController::class);
});
