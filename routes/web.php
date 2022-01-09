<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\acceuilController;
use App\Http\Controllers\annonceController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\news_detailsController;
use App\Http\Controllers\presentationController;
use App\Http\Controllers\statistiquesController;

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

Route::get('/acceuil', [acceuilController::class,'index'])->name('acceuil');
Route::get('/show', [acceuilController::class,'show'])->name('show');

Route::post('/acceuil', [acceuilController::class,'index'])->name('acceuil_connexion');


Route::post('/acceuil', [acceuilController::class,'search'])->name('search');

Route::get('/annonce/{id}', [annonceController::class,'index'])->name('annonce');
Route::post('/annonce', [annonceController::class,'add_annonce'])->name('add_annonce');
Route::post('/annonce/modifier/{id}', [annonceController::class,'modifier']);
Route::get('/annonce/delete/{id}', [annonceController::class,'delete']);
Route::get('/annonce/cancel/{id}', [annonceController::class,'cancel']);


Route::get('/presentation', [presentationController::class,'index'])->name('presentation');

Route::get('/news', [newsController::class,'index'])->name('news');
Route::get('/news/{id}', [news_detailsController::class,'index']);

Route::get('/statistiques', [statistiquesController::class,'index'])->name('statistiques');

Route::get('/contact', [contactController::class,'index'])->name('contact');

Route::get('/inscription', [authController::class,'register_show'])->name('inscription');
Route::post('/inscription', [authController::class,'register'])->name('add_user');

Route::post('/connexion', [authController::class,'login'])->name('login');
Route::get('/deconnexion', [authController::class,'logout'])->name('logout');

Route::get('/profile', [profileController::class,'index'])->name('profile');
Route::post('/profile', [profileController::class,'check_password'])->name('check_password');
Route::post('/modifier', [profileController::class,'modifier'])->name('modifier');
Route::post('/etre_transporteur', [profileController::class,'etre_transporteur'])->name('etre_transporteur');
Route::post('/etre_certifie', [profileController::class,'etre_certifie'])->name('etre_certifie');
Route::post('/noter_transporteur', [profileController::class,'noter_transporteur'])->name('noter_transporteur');
Route::post('/signaler_transporteur', [profileController::class,'signaler_transporteur'])->name('signaler_transporteur');



