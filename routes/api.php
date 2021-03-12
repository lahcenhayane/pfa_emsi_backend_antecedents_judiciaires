<?php

use App\Http\Controllers\CriminalController;
use App\Http\Controllers\VictimeController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::post('/login', [UserController::class,'login'])->middleware('cors');
Route::post('/register', [UserController::class,'register']);
Route::group(['middleware' => 'auth.jwt', 'cors'], function () {

    Route::get('/index', [UserController::class,'index']);
    Route::get('/info', [UserController::class,'info']);
    Route::get('/countgp', [UserController::class,'countGP']);
    Route::delete('/destroy/{id}', [UserController::class,'destroy']);
    Route::get('/findUser/{id}', [UserController::class,'find']);
    Route::put('/update', [UserController::class,'update']);
    Route::get('logout', 'ApiController@logout');

    Route::get('/countcriminal', [UserController::class,'countcriminal']);
    Route::get('/criminals/find/{id}', [CriminalController::class,'find']);
    Route::put('/criminals/modifier', [CriminalController::class,'modifier']);
    Route::resource('/criminals', CriminalController::class);


    Route::put('/fichiers/modifier',[FichierController::class, 'modifier']);
    Route::get('/fichiers/getAllInformation/{id}',[FichierController::class, 'getAllInformation']);
    Route::resource('/fichiers',FichierController::class);

    Route::get('/victime/find/{id}', [VictimeController::class,'find']);
    Route::put('/victime/modifier', [VictimeController::class,'modifier']);
    Route::resource('/victime', VictimeController::class);

});
