<?php

use App\Http\Controllers\ChapitreController;
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


Route::get('/profil', function () {
    $title = "Profil";
    return view('profil',['title' => $title]);
})->middleware(['auth'])->name('profil');

Route::get('/equipe', [EquipeController::class, 'index'])->name("equipe");

Route::fallback(function (){
    return view('errors.404');
});

Route::resource('histoire', HistoireController::class);

Route::get('chapitres/create',[ChapitreController::class, 'create']);

Route::post('chapitres',[ChapitreController::class, 'store'])->name('chapitre.store');

Route::get('chapitres/create-chapitres/{id}',[ChapitreController::class,'create'])->name('create-chapitre');

Route::get('encours/{id}',[HistoireController::class,'encours'])->name('encours');

Route::post('chapitres/lier/{id}', [ChapitreController::class, 'link'])->name('lier');

Route::post('/add_avis', [HistoireController::class, 'add_avis'])->middleware(['auth'])->name('add_avis');

Route::get('/delete_avis', [HistoireController::class, 'delete_avis'])->middleware(['auth'])->name('delete_avis');
