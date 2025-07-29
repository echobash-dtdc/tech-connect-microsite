<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\FeedBackController;
use App\Http\Controllers\Frontend\TeamMemberController;
use App\Http\Controllers\Frontend\OrganisationController;
use App\Http\Controllers\Frontend\ResourceController;
use App\Http\Controllers\Frontend\AuthController;

/**
 * Keycloak Login
 */
// Keycloak Auth Routes
Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', 'redirectToKeycloak')->name('login');
    Route::get('/callback', 'handleKeycloakCallback')->name('callback');
    Route::get('/logout', 'logout')->name('logout');
});

/**
 * Public Pages
 */
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('frontend.index');
    Route::get('/about', 'about')->name('frontend.about');
    Route::get('/events', action: 'events')->name('frontend.events');
    Route::get('/pricing', 'pricing')->name('frontend.pricing');
    Route::get('/blog', 'blog')->name('frontend.blog');
});

Route::get('/organisation', [OrganisationController::class, 'index'])->name('frontend.organisation');


/**
 * Auth-Protected Routes
 */
Route::middleware('auth')->group(function () {

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

    // Organisation

    // Feedback
    Route::get('/feedback', [FeedBackController::class, 'create'])->name('frontend.feedback');
    Route::post('/feedback/save', [FeedBackController::class, 'saveFeedbackFormData'])->name('feedback.save');

    // Resources
    Route::prefix('resource')->name('frontend.resource.')->controller(ResourceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/download/{id}', 'download')->name('download');
    });

});