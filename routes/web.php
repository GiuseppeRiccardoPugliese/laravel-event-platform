<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Models\Event;
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


//Rotta in index per i TAGS
Route::get('/tags', [TagController::class, 'index'])->name('tag.index');

//Rotta in index per gli EVENTS
Route::get('/', [EventController::class, 'index'])->name('event.index');

//Rotta CREATE
Route::get('/events/create', [EventController::class, 'create'])
    ->name('event.create');

//Rotta STORE
Route::post('/events/create', [EventController::class, 'store'])
    ->name('event.store');

//Rotta EDIT
Route::get('/edit/{id}', [EventController::class, 'edit'])
    ->name('event.edit');

//Rotta UPDATE
Route::put('/edit/{id}', [EventController::class, 'update'])
    ->name('event.update');

//Rotta DELETE
Route::delete('/events/{id}', [EventController::class, 'delete'])->name('event.delete');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Rotta in show per gli EVENTS
route::get('/events/{id}', [EventController::class, 'show'])->name('event.show');
