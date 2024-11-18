<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TVShowController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SearchController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Movies Routes
Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

//Tv Shows Routes
Route::get('/tv', [TVShowController::class, 'index'])->name('tv.index');
Route::get('/tv/{id}', [TVShowController::class, 'show'])->name('tv.show');

//Auth Routes
Route::get('/auth/tmdb', [AuthController::class, 'redirectToTMDB'])->name('login');
Route::get('/auth/tmdb/callback', [AuthController::class, 'handleTMDBCallback'])->name('auth.tmdb.callback');

//Search Route
Route::get('/search', [SearchController::class, 'search'])->name('search');
