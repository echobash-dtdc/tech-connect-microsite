<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\TeamMemberController;

Route::get('/', [FrontController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontController::class, 'about'])->name('frontend.about');
Route::get('/blogs', [BlogController::class, 'index'])->name('frontend.blogs.index');
Route::get('/blogs/show/{id}', [BlogController::class, 'show'])->name('frontend.blogs.show');
Route::get('/team_members', [TeamMemberController::class, 'index'])->name('frontend.team_members.index');
Route::get('/events', [FrontController::class, 'events'])->name('frontend.events');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('frontend.pricing');
Route::get('/feedback', [FrontController::class, 'feedback'])->name('frontend.feedback');
Route::get('/blog', [FrontController::class, 'blog'])->name('frontend.blog');
