<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DevisesController;

Route::get('/devises',[DevisesController::class, 'index']);

Route::post('/devises/add',[DevisesController::class, 'add']);

Route::put('/devises/edit/{id}',[DevisesController::class, 'edit']);

Route::delete('/devises/delete/{id}',[DevisesController::class, 'delete']);


// Route Api utilisateurs


Route::get('/users',[UserController::class, 'getUsers']);






