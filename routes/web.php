<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);
Route::get('tasks/export', [TaskController::class, 'export'])->name('tasks.export');
Route::get('tasks/search', [TaskController::class, 'search'])->name('tasks.search');
