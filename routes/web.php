<?php

use App\Http\Controllers\Frontend\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\FeedBackController;
use App\Http\Controllers\Frontend\TeamMemberController;
use App\Http\Controllers\Frontend\OrganisationStructureController;

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
Route::get('/events', [EventController::class, 'index'])->name('frontend.events');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('frontend.pricing');
Route::get('/feedback', [FeedBackController::class, 'create'])->name('frontend.feedback');
Route::post('/feedback/save', [FeedBackController::class, 'saveFeedbackFormData'])->name('feedback.save');
Route::get('/blog', [FrontController::class, 'blog'])->name('frontend.blog');

// Feedback
// Route::get('/feedback', [FeedBackController::class, 'create'])->name('frontend.feedback');

// Feedback
Route::get('/organisation_structure', [OrganisationStructureController::class, 'index'])->name('frontend.organisation_structure');
