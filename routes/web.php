<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/subscription', function () {
    return Inertia::render('Subscription');
})->name('subscription');

Route::get('/subscription-details', function () {
    return Inertia::render('SubscriptionDetails');
})->name('subscription-details');

Route::get('/my-subscription-details', function () {
    return Inertia::render('MySubscriptionDetails');
})->name('my-subscription-details');

Route::get('/gym-members', function () {
    return Inertia::render('GymMembers');
})->name('gym-members');

Route::get('/registered-account', function () {
    return Inertia::render('RegisteredAccount');
})->name('registered-account');


require __DIR__.'/auth.php';
