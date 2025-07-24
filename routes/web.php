<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontController::class, 'about'])->name('frontend.about');
Route::get('/courses', [FrontController::class, 'courses'])->name('frontend.courses');
Route::get('/trainers', [FrontController::class, 'trainers'])->name('frontend.trainers');
Route::get('/events', [FrontController::class, 'events'])->name('frontend.events');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('frontend.pricing');
Route::get('/feedback', [FrontController::class, 'feedback'])->name('frontend.feedback');
Route::get('/blog', [FrontController::class, 'blog'])->name('frontend.blog');
