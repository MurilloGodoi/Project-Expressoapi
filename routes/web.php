<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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


Route::get('/', [Controllers\LoginController::class, 'index'])->name('entrar');
Route::post('/', [Controllers\LoginController::class, 'login']);
Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/resume', [Controllers\ResumeController::class, 'index'])->name('resume')->middleware('auth');
Route::get('/settings', [Controllers\SettingsController::class, 'index'])->name('settings');
Route::get('/newpassword', [Controllers\NewPasswordController::class, 'index'])->name('newpassword');
Route::post('/newpassword', [Controllers\NewPasswordController::class, 'newpasandemail'])->name('newpassword');

//Auth::routes();

Route::get('/logout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
});


