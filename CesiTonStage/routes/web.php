<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regions/create', [RegionController::class, 'create'])->name('regions.create');
Route::post('/regions', [RegionController::class, 'store'])->name('regions.store');

Route::get('/create_account/create', [LoginController::class, 'create'])->name('create_account.create');
Route::post('/create_account', [LoginController::class, 'store'])->name('create_account.store');


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
