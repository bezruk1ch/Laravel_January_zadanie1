<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route::get('/', function () {
// return view('welcome');
// });

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create', [ReportController::class, 'create'])->name('reports.create-form');
    Route::get('/history', [ReportController::class, 'history'])->name('reports.reports-history');

    Route::post('/create', [ReportController::class, 'store'])->name('reports.store');
});

Route::middleware(['auth', AdminAuthMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin-panel');
    Route::post('/admin/reports/{id}/confirm', [AdminController::class, 'confirm'])->name('reports.confirm');
    Route::post('/admin/reports/{id}/cancel', [AdminController::class, 'cancel'])->name('reports.cancel');
});

require __DIR__ . '/auth.php';
