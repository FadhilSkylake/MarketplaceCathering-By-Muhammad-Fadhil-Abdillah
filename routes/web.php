<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AuthController;

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




Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('login.form');
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('dologin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('menu', MenuController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/edit', [AuthController::class, 'login'])->name('edit');
});
