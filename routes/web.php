<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HistoireController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[WelcomeController::class, 'welcome'])->name("index");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/mentions', function () {
    return view('mentions');
})->name("mentions");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::fallback(function (){
    return view('errors.404');
});

Route::get('/equipe', [EquipeController::class, 'index'])->name("equipe");

Route::resource('histoire', HistoireController::class);

