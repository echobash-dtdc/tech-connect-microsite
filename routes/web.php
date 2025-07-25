<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\FeedBackController;
use App\Http\Controllers\Frontend\TeamMemberController;

// Home and general pages
Route::get('/', [FrontController::class, 'index'])->name('frontend.index');

Route::prefix('frontend')->name('frontend.')->group(function () {
    
    // Static pages
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/events', [FrontController::class, 'events'])->name('events');
    Route::get('/pricing', [FrontController::class, 'pricing'])->name('pricing');
    Route::get('/blog', [FrontController::class, 'blog'])->name('blog'); // not the same as blogs

    // Blogs
    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/show/{id}', [BlogController::class, 'show'])->name('show');
    });

    // Team Members
    Route::get('/team_members', [TeamMemberController::class, 'index'])->name('team_members.index');

    // Feedback
    Route::get('/feedback', [FeedBackController::class, 'create'])->name('feedback');
});