<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisesController;

Route::get('/devises',[DevisesController::class, 'index']);


Route::post('/addDevises',[DevisesController::class, 'add']);

