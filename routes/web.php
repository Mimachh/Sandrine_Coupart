<?php


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:Patient'])->prefix('admin/')->group(function () {
        Route::view('recettes', 'admin.recettes');
        Route::view('allergenes', 'admin.allergenes');
        Route::view('regimes', 'admin.regimes');
        Route::view('users', 'admin.users');
        Route::view('patients', 'admin.patients');
    });
});







