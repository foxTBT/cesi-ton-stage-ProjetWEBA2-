<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\CguController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NosValeursController;
use App\Http\Controllers\QuiSommesNousController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
Route::post('/offers/store', [OfferController::class, 'store'])->name('offers.store');
Route::get('/offers/{id}/edit', [OfferController::class, 'edit'])->name('offers.edit');
Route::put('/offers/{id}', [OfferController::class, 'update'])->name('offers.update');

Route::get('/regions/create', [RegionController::class, 'create'])->name('regions.create');
Route::post('/regions', [RegionController::class, 'store'])->name('regions.store');

Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::get('/accounts/show-pilote', [AccountController::class, 'showPilote'])->name('accounts.show-pilote');
Route::get('/accounts/show-student', [AccountController::class, 'showStudent'])->name('accounts.show-student');
Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
Route::delete('/accounts/destroy/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');
Route::get('/accounts/{id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');
Route::get('/accounts/show-student/{id}', [AccountController::class, 'showStudentDetails'])->name('accounts.show-student-details');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Routes pour la gestion des cookies
Route::post('/accept-cookies', [AuthController::class, 'acceptCookies'])->name('accept.cookies');
Route::post('/reject-cookies', [AuthController::class, 'rejectCookies'])->name('reject.cookies');
Route::get('/check-cookies', [AuthController::class, 'checkCookies'])->name('check.cookies');
//pour la page de controle des cookies (côté utilisateur)

//pages du footer
Route::get('/politique-de-protection-des-donnees', [CookieController::class, 'showCookieSettings'])->name('cookie.settings');
Route::post('/cookies/update', [CookieController::class, 'updateCookies'])->name('cookie.update');

Route::get('/support', [SupportController::class, 'index'])->name('support.support');
Route::get('/cgu', [CguController::class, 'index'])->name('cgu.cgu');
Route::get('/faq', [FaqController::class, 'index'])->name('a_propos.faq');
Route::get('/nos-valeurs', [NosValeursController::class, 'index'])->name('a_propos.nos_valeurs');
Route::get('/qui-sommes-nous', [QuiSommesNousController::class, 'index'])->name('a_propos.qui_sommes_nous');

Route::get('/companies/create', [CompaniesController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');

Route::get('/companies/search', [CompaniesController::class, 'search'])->name('companies.search');
Route::get('/companies/show/{Id_Company}', [CompaniesController::class, 'show'])->name('companies.show');
Route::delete('/companies/destroy/{Id_Company}', [CompaniesController::class, 'destroy'])->name('companies.destroy');
Route::get('/companies/{Id_Company}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::put('/companies/update/{Id_Company}', [CompaniesController::class, 'update'])->name('companies.update');

