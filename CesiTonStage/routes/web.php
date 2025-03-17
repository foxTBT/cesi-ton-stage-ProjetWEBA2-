<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regions/create', [RegionController::class, 'create'])->name('regions.create');
Route::post('/regions', [RegionController::class, 'store'])->name('regions.store');

Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');

Route::get('/logins/create', [LoginController::class, 'create'])->name('logins.create');
Route::post('/logins', [LoginController::class, 'store'])->name('logins.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

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

use App\Http\Controllers\CompaniesController;

Route::get('/companies/create', [CompaniesController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');

Route::get('/companies/search', [CompaniesController::class, 'search'])->name('companies.search');
Route::get('/companies/show/{Id_Company}', [CompaniesController::class, 'show'])->name('companies.show');
Route::put('/companies/{Id_Company}/update', [CompaniesController::class, 'update'])->name('companies.update');
Route::delete('/companies/{Id_Company}/delete', [CompaniesController::class, 'delete'])->name('companies.delete');
Route::get('/companies/{Id_Company}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
