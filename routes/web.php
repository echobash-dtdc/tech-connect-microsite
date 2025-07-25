<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\FeedBackController;
use App\Http\Controllers\Frontend\TeamMemberController;

// Base pages
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('frontend.index');
    Route::get('/about', 'about')->name('frontend.about');
    Route::get('/events', 'events')->name('frontend.events');
});

// Blogs
Route::prefix('blogs')->name('frontend.blogs.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{id}', 'show')->name('show');
});

// Projects
Route::prefix('projects')->name('frontend.projects.')->controller(ProjectController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{id}', 'show')->name('show');
});

// Team Members
Route::get('/team_members', [TeamMemberController::class, 'index'])->name('frontend.team_members.index');

// Feedback
Route::get('/feedback', [FeedBackController::class, 'create'])->name('frontend.feedback');