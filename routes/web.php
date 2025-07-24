<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\BlogController;

Route::get('/', [FrontController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontController::class, 'about'])->name('frontend.about');
Route::get('/blogs', [FrontController::class, 'courses'])->name('frontend.blogs.index');
Route::get('/trainers', [FrontController::class, 'trainers'])->name('frontend.trainers');
Route::get('/events', [FrontController::class, 'events'])->name('frontend.events');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('frontend.pricing');
Route::get('/contact', [FrontController::class, 'contact'])->name('frontend.contact');
