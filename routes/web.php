<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.create');
});

Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

Route::get('/students/register', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/students/register', [StudentController::class, 'store'])
    ->name('students.store');

Route::get('/students/{student}', [StudentController::class, 'show'])
    ->name('students.show');

Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');

Route::put('/students/{student}', [StudentController::class, 'update'])
    ->name('students.update');
