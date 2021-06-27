<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PropertyController;


Route::get('/', [NavigationController::class,'index']);
Route::get('/about', [NavigationController::class,'about']);
Route::get('/contact', [NavigationController::class,'contact']);

Route::post('/search-property',[PropertyController::class,'searchProperty'])->name('search.property');


