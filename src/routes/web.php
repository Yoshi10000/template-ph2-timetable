<?php

use App\Http\Controllers\TimetableController;
use App\Http\Controllers\TimetableEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/timetable', [TimetableController::class, 'index']);

Route::get('/entries', [TimetableEntryController::class, 'index'])->name('entries.index');
Route::get('/entries/create', [TimetableEntryController::class, 'create'])->name('entries.create');
Route::post('/entries', [TimetableEntryController::class, 'store'])->name('entries.store');
