<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\Task\Controller as TaskController;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

// make route for task
Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('', [TaskController::class, 'create'])->name('task.create');
Route::post('', [TaskController::class, 'store'])->name('task.store');
Route::get('/{id}', [TaskController::class, 'show'])->name('task.show');
Route::put('/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');


require __DIR__.'/settings.php';
