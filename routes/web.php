<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TourController;

Route::get('/', [NavigationController::class,'index'])->name('index');
Route::get('/about', [NavigationController::class,'about']);
Route::get('/contact', [NavigationController::class,'contact']);

Route::post('/search-results',[PropertyController::class,'searchProperty'])->name('search.property');
Route::get('/property/{id}',[PropertyController::class,'singleProperty'])->name('property.single');

Route::get('/schedule-tour/{id}/{property}',[TourController::class,'scheduleTour'])->name('schedule.tour');
Route::post('/confirm-tour',[TourController::class,'confirmTour'])->name('confirm.tour');


