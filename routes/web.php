<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// dashboard page
Route::get('/', [DashboardController::class, "index"])->name('dashboard');

// idea/{idea}
Route::resource('idea', IdeaController::class)->except(['index', 'create'])->middleware('auth');
Route::resource('idea', IdeaController::class)->only(['show']);

// idea/{idea}/comments/
Route::resource('idea.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');



// Route::get('/terms', function () {
//     return view("terms");
// });