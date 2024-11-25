<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeriesController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [SeriesController::class, 'index'])->name('dashboard');
    Route::get('/series', [SeriesController::class, 'index'])->name('series');
    Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
    Route::get('/series/{series}', [SeriesController::class, 'show'])->name('series.show');
    Route::delete('/series', [SeriesController::class, 'destroy'])->name('series.destroy');
    Route::post('episode-completed/{episode}', EpisodeController::class)->name('completed');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});

require __DIR__ . '/auth.php';
