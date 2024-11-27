<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostFeedController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', fn() => view('welcome'))->name('home');

Route::prefix('feed')->name('feed.')->group(function () {
    Route::get('/', [PostFeedController::class, 'index'])->name('index');
    Route::get('/post/{post}', [PostFeedController::class, 'show'])->name('post');
    Route::get('/search', [PostFeedController::class, 'search'])->name('search');
    Route::get('/category/{category}', [PostFeedController::class, 'category'])->name('category');
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Comment routes
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Post resource routes
    Route::resource('posts', PostController::class);

    // Profile routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
