<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Website Public Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Panel (Protected by Auth middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/navbar', [ContentController::class, 'navbar'])->name('navbar');
    Route::post('/navbar', [ContentController::class, 'updateNavbar'])->name('navbar.update');

    Route::get('/hero', [ContentController::class, 'hero'])->name('hero');
    Route::post('/hero', [ContentController::class, 'updateHero'])->name('hero.update');

    Route::get('/general', [ContentController::class, 'general'])->name('general');
    Route::post('/general', [ContentController::class, 'updateGeneral'])->name('general.update');

    Route::get('/programme', [ContentController::class, 'programme'])->name('programme');
    Route::post('/programme', [ContentController::class, 'updateProgramme'])->name('programme.update');

    Route::get('/teachers', [ContentController::class, 'teachers'])->name('teachers');
    Route::post('/teachers', [ContentController::class, 'updateTeachers'])->name('teachers.update');

    Route::get('/stats', [ContentController::class, 'stats'])->name('stats');
    Route::post('/stats', [ContentController::class, 'updateStats'])->name('stats.update');

    Route::get('/gallery', [ContentController::class, 'gallery'])->name('gallery');
    Route::post('/gallery', [ContentController::class, 'updateGallery'])->name('gallery.update');

    Route::get('/testimonials', [ContentController::class, 'testimonials'])->name('testimonials');
    Route::post('/testimonials', [ContentController::class, 'updateTestimonials'])->name('testimonials.update');

    Route::get('/passes', [ContentController::class, 'passes'])->name('passes');
    Route::post('/passes', [ContentController::class, 'updatePasses'])->name('passes.update');

    Route::get('/faqs', [ContentController::class, 'faqs'])->name('faqs');
    Route::post('/faqs', [ContentController::class, 'updateFaqs'])->name('faqs.update');
});
