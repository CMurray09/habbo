<?php

use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GameController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/play', [GameController::class, 'loadView'])->name('play');

Route::redirect('/nova/login', '/login');

Route::post('/password-reset', [ForgotPasswordController::class, 'resetPassword'])->name('password-reset');
Route::post('/user/play/add-to-favourites/{gameID}', [FavouriteController::class, 'addToFavourites'])->name('favourite');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
