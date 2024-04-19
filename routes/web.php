<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

// contents page
Route::group(['prefix' => 'ideas/', 'as' => 'idea.'], function () {
    // Route::get('/{idea}', [IdeaController::class, "show"])->name('show');;
    // Route::post('', [IdeaController::class, "store"])->name('store');

    Route::group(['middleware' => ['auth']], function () {
        // Route::get('/{idea}/edit', [IdeaController::class, "edit"])->name('edit');
        // Route::put('/{idea}', [IdeaController::class, "update"])->name('update');
        // Route::delete('/{idea}', [IdeaController::class, "destroy"])->name('destroy');
        // comments page
        Route::post('/{idea}/comments', [CommentController::class, "store"])->name('comments.store');
    });
});

// ideas {ideas}
Route::resource('ideas', IdeaController::class);
// Route::resource("ideas", IdeaController::class)->except(['show']);

Route::get('/terms', function () {
    return view("terms");
});