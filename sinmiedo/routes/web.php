<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Rutas para la sección de foro
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{post}', [ForumController::class, 'show'])->name('forum.show');
    // Rutas para la sección de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware('auth')->group(function () {
        Route::resource('forum', ForumController::class)->only([
            'index',
            'create',
            'store',
            'show'
        ]);
    });
    // Rutas para la sección de ayuda
    Route::get('/help', function () {
        return view('help.index');
    })->name('help.index');
});
// Rutas para reportes anónimos
Route::get('/reports', [ReportController::class, 'index']);
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

Route::get('/reports/{id}', [ReportController::class, 'show']);
Route::patch('/reports/{id}/status', [ReportController::class, 'updateStatus']);


require __DIR__ . '/auth.php';
