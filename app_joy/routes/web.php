<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// READ - Display all students
Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

// CREATE - Show form
Route::get('/students/create', [StudentController::class, 'create'])
    ->name('students.create');

// CREATE - Store student
Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');

// UPDATE - Show edit form
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');

// UPDATE - Save changes
Route::put('/students/{id}', [StudentController::class, 'update'])
    ->name('students.update');

// DELETE - Remove student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])
    ->name('students.destroy');