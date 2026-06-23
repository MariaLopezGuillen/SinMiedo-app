<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [DiaryController::class, 'index'])->name('diary.index');

// Rutas para reportes anónimos (sin autenticación)
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::patch('/reports/{id}/status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');

// Rutas públicas de ayuda y about
Route::get('/help', function () {
    return view('help.index');
})->name('help.index');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (requieren autenticación)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ── Perfil ──
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ── Foro ──
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{post}', [ForumController::class, 'show'])->name('forum.show');

    // ── Diario ──
    Route::get('/diary/create', [DiaryController::class, 'create'])->name('diary.create');
    Route::post('/diary', [DiaryController::class, 'store'])->name('diary.store');
    Route::get('/diary/{entry}', [DiaryController::class, 'show'])->name('diary.show');
    Route::post('/diary/{entry}/unlock', [DiaryController::class, 'unlock'])->name('diary.unlock');
    Route::get('/diary/{entry}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
    Route::put('/diary/{entry}', [DiaryController::class, 'update'])->name('diary.update');
    Route::delete('/diary/{entry}', [DiaryController::class, 'destroy'])->name('diary.destroy');
});

require __DIR__ . '/auth.php';