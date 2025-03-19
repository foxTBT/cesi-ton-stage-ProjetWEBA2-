<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompaniesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regions/create', [RegionController::class, 'create'])->name('regions.create');
Route::post('/regions', [RegionController::class, 'store'])->name('regions.store');

Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');
Route::get('/account/show-pilote', [AccountController::class, 'showPilote'])->name('account.show-pilote');
Route::get('/account/show-student', [AccountController::class, 'showStudent'])->name('account.show-student');
Route::post('/account', [AccountController::class, 'store'])->name('account.store');
Route::delete('/account/destroy/{id}', [AccountController::class, 'destroy'])->name('account.destroy');
Route::get('/account/{id}/edit', [AccountController::class, 'edit'])->name('account.edit');
Route::put('/account/{id}', [AccountController::class, 'update'])->name('account.update');
//Sfx21
Route::get('/account/show-student/{id}', [AccountController::class, 'showStudentDetails'])->name('account.show-student-details');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Routes pour la gestion des cookies
Route::post('/accept-cookies', [AuthController::class, 'acceptCookies'])->name('accept.cookies');
Route::post('/reject-cookies', [AuthController::class, 'rejectCookies'])->name('reject.cookies');
Route::get('/check-cookies', [AuthController::class, 'checkCookies'])->name('check.cookies'); // <--- Ajout de cette route
//pour la page de controle des cookies (côté utilisateur)
use App\Http\Controllers\CookieController;

Route::get('/politique-de-protection', [CookieController::class, 'showCookieSettings'])->name('cookie.settings');
Route::post('/cookies/update', [CookieController::class, 'updateCookies'])->name('cookie.update');


Route::get('/dashboard', function () {
    if (!session('account')) return redirect()->route('login');
    return "Bienvenue sur le dashboard, " . session('account')->Email_Account;
})->name('dashboard');

Route::get('/admin', function () {
    if (!session('account') || (int) session('account')->Id_Role !== 1) {
        return redirect()->route('dashboard');
    }
    return "Bienvenue sur la page Admin";
})->name('admin.page');



Route::get('/companies/create', [CompaniesController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');

Route::get('/companies/search', [CompaniesController::class, 'search'])->name('companies.search');
Route::get('/companies/show/{Id_Company}', [CompaniesController::class, 'show'])->name('companies.show');
Route::delete('/companies/destroy/{Id_Company}', [CompaniesController::class, 'destroy'])->name('companies.destroy');
Route::get('/companies/{Id_Company}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::put('/companies/update/{Id_Company}', [CompaniesController::class, 'update'])->name('companies.update');
