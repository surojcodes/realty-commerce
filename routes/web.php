<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DataDownloadController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CartController;

Route::get('/download',[DataDownloadController::class,'download']);

Route::get('/', [NavigationController::class,'index'])->name('index');
Route::get('/about', [NavigationController::class,'about']);
Route::get('/contact', [NavigationController::class,'contact']);
Route::post('/contact',[TourController::class,'contactEmail'])->name('contact.email');

Route::post('/search-results',[PropertyController::class,'searchProperty'])->name('search.property');
Route::get('/property/{id}',[PropertyController::class,'singleProperty'])->name('property.single');
Route::post('/filter-price/{keyword}',[PropertyController::class,'filterByPrice'])->name('filter.price');

Route::get('/schedule-tour/{id}/{property}/{price}',[TourController::class,'scheduleTour'])->name('schedule.tour');
Route::post('/confirm-tour',[TourController::class,'confirmTour'])->name('confirm.tour');

Route::post('/add-cart',[CartController::class,'addToCart'])->name('add.cart');
Route::get('/delete-item/{id}',[CartController::class,'removeItem']);
Route::get('/cart',[CartController::class,'getCart']);
Route::get('/clear-cart',[CartController::class,'clearCart']);
Route::get('/schedule-cart',[CartController::class,'scheduleCart']);




