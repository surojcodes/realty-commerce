<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;

Route::get('/', [NavigationController::class,'index']);
Route::get('/about', [NavigationController::class,'about']);
Route::get('/contact', [NavigationController::class,'contact']);


