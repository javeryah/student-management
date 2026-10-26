<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', fn () => redirect()->route('students.index'));
Route::resource('students', StudentController::class)->except(['show']);
