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

    Route::middleware(['role:Admin'])->prefix('admin/')->group(function () {

        /* Old route and field i can delete */
        Route::view('recettes', 'admin.recettes');
        Route::view('allergenes', 'admin.allergenes');
        Route::view('regimes', 'admin.regimes');
        Route::view('users', 'admin.users');
        Route::view('patients', 'admin.patients');
    });
});


Route::resource('contact', ContactController::class)->except('store');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::view('confirmation', 'contact.confirmation')->name('contact.confirmation');


/* View for guests or patients*/
Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');
Route::resource('/recettes', RecetteController::class)->except('index');
Route::get('/guest', [RecetteGuestController::class, 'index']);

