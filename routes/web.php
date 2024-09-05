<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeriesController;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/dashboard', [SeriesController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/series', [SeriesController::class, 'index'])->name('series');
Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
Route::get('/series/{series}', [SeriesController::class, 'show'])->name('series.show');
Route::delete('/series', [SeriesController::class, 'destroy'])->name('series.destroy');

Route::post('completed', function () {
    $episode = Episode::find(request('completed'));

        $episode->completed = true;
        $episode->save();


    return back();
})->name('completed');


if (User::first()) {
    Auth::login(User::first()) ;
}
require __DIR__.'/auth.php';
