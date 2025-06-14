<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return redirect()->route('berita.index');
});

// Dashboard admin (khusus admin)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');
    Route::resource('kategori', KategoriController::class);
    Route::resource('berita', BeritaController::class);
    Route::post('berita/{berita}/approve', [BeritaController::class, 'approve'])->name('berita.approve');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
