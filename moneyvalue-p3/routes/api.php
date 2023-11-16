<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaireController;
use App\Http\Controllers\DevisesController;


// Route Api Cuurency

Route::get('/devises',[DevisesController::class, 'index']);

Route::get('/devises/{id}',[DevisesController::class, 'oneCurrency']);

Route::post('/devises/add',[DevisesController::class, 'add']);

Route::put('/devises/edit/{id}',[DevisesController::class, 'edit']);

Route::delete('/devises/delete/{id}',[DevisesController::class, 'delete']);


// Route Api Paires

Route::get('/paire',[PaireController::class, 'index']);

Route::get('/paire/{id}',[PaireController::class, 'onePaire']);

Route::post('/paire/add',[PaireController::class, 'add']);

Route::put('/paire/edit/{id}',[PaireController::class, 'edit']);

Route::delete('/paire/delete/{id}',[PaireController::class, 'delete']);


// Route Api utilisateurs

Route::post('/login',[UserController::class, 'authenticate']);
Route::post('/privateInformations',function (){
    return response()->json([
        'informations' => "Hello World"
    ]);
});

Route::post('/signup',[UserController::class, 'subscribe']);

Route::get('/dashboard',[UserController::class, 'dashboard'])
->middleware('aut:sanctum');







