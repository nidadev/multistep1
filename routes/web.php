<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});






Route::get('products/create-step-one', [ProductController::class, 'createStepOne'])->name('products.step-one');
Route::post('products/create-step-one', [ProductController::class, 'postCreateStepOne'])->name('products.step-one');
Route::get('products/create-step-two', [ProductController::class, 'createStepTwo'])->name('products.step-two');
Route::post('products/create-step-two', [ProductController::class, 'postCreateStepTwo'])->name('products.step-two');
Route::get('products/create-step-three', [ProductController::class, 'createStepThree'])->name('products.step-three');
Route::post('products/create-step-three', [ProductController::class, 'postCreateStepThree'])->name('products.step-three');

Route::get('products/create-step-four', [ProductController::class, 'createStepFour'])->name('products.step-four');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
