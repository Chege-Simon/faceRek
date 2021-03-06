<?php

use App\Http\Livewire\AddNewStudent;
use App\Http\Livewire\Admit;
use App\Http\Livewire\Students;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
////
//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/add-new-student', AddNewStudent::class )->name('add-new-student');

Route::middleware(['auth:sanctum', 'verified'])->get('/students', Students::class )->name('students');

Route::middleware(['auth:sanctum', 'verified'])->get('/', Admit::class )->name('admit');
