<?php

use App\Http\Controllers\Frontend\OrganisationController;
use App\Http\Controllers\Frontend\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\FeedBackController;
use App\Http\Controllers\Frontend\TeamMemberController;
use App\Http\Controllers\Frontend\OrganisationStructureController;
use App\Http\Controllers\Frontend\ResourceController;

// Base pages
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('frontend.index');
    Route::get('/about', 'about')->name('frontend.about');
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


Route::get('/blog', [FrontController::class, 'blog'])->name('frontend.blog');
Route::get('/organisation', [OrganisationController::class, 'index'])->name('frontend.organisation');

Route::get('/feedback', [FeedBackController::class, 'create'])->name('frontend.feedback');
Route::post('/feedback/save', [FeedBackController::class, 'saveFeedbackFormData'])->name('feedback.save');

// Route::prefix('feedback')->name('frontend.feedback.')->controller(FeedBackController::class)->group(function () {
//     Route::get('/', 'create')->name('create');
//     Route::post('/save', 'saveFeedbackFormData')->name('save');
// });

Route::prefix('resource')->name('frontend.resource.')->controller(ResourceController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/download/{id}', 'download')->name('download');
});
