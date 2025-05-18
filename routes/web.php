<?php

use App\Http\Controllers\DebugController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/debug-api-key', [DebugController::class, 'debug'])->name('debug.debug');

Route::get('/text/editor', [EditorController::class, 'index'])->name('editor.index');
Route::post('/editor/create-post', [EditorController::class, 'store'])->name('editor.store');
require __DIR__.'/auth.php';
