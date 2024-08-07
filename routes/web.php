<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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




Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('dologin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('login');
Route::post('/destroy', [AuthController::class, 'destroy'])->name('login');

Route::resource('dashboard', DashboardController::class);
Route::resource('user', UserController::class);
Route::resource('menu', MenuController::class);
Route::resource('merchant', MerchantController::class);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
});
