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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    
    /* Dashboard for Admin */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /* Receipts for Patients */
    Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');
    Route::resource('/recettes', RecetteController::class)->except('index')->except('show');


    Route::middleware(['role:Admin'])->prefix('admin/')->group(function () {

    });
});


Route::resource('contact', ContactController::class)->except('store');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::view('confirmation', 'contact.confirmation')->name('contact.confirmation');


/* View for receipts guests*/
Route::get('/guest', [RecetteGuestController::class, 'index'])->name('guest.index');
Route::get('/recettes/{recette}', [RecetteController::class, 'show'])->name('recettes.show');

