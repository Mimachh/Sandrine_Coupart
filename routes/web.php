<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\RecetteGuestController;

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


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    /* Messages receive by user */
    Route::get('/messages_show/{contact}', [ContactController::class, 'show'])->name('contact.show');

    /* Receipts for Patients */
    Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');
    Route::resource('/recettes', RecetteController::class)->except('index')->except('show');
    Route::get('/my_dashboard', function() { return view('dashboard_patient'); })->name('dashboard.patient');

    /* ADMIN ROUTES */
    Route::middleware(['role:Admin'])->prefix('admin/')->group(function () {

        Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    });
});


Route::resource('contact', ContactController::class)->except('store');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::view('confirmation', 'contact.confirmation')->name('contact.confirmation');


/* View for receipts guests*/
Route::get('/guest', [RecetteGuestController::class, 'index'])->name('guest.index');
Route::get('/recettes/{recette}', [RecetteController::class, 'show'])->name('recettes.show');

Route::get('/', function () { return view('welcome'); })->name('/');

Route::get('/terms', function () { return view('terms'); })->name('terms');

