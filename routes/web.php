<?php

use App\Http\Controllers\CataloguesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('user.home');
});

Route::get('/', function () {
    return view('user.detail');
});

Route::resource('/', HomeController::class);
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/catalogues', [HomeController::class, 'view'])->name('katalog.view');
Route::get('/catalogues/{id}/show', [HomeController::class, 'show'])->name('katalog.show');
Route::post('/catalogues/{id}/order', [HomeController::class, 'store'])->name('katalog.order');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [LoginController::class, 'register'])->name('register.form');
Route::post('/create', [LoginController::class, 'create'])->name('register.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::resource('/dashboard', DashboardController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/catalogues-list', CataloguesController::class);
    Route::get('/catalogues-list', [CataloguesController::class, 'index'])->name('catalogues');

    Route::resource('/order-list', OrderController::class);
    Route::get('/order-list', [OrderController::class, 'index'])->name('order');
    Route::put('/order-list/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/order-list/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::resource('/report', ReportController::class);
    Route::get('/report', [ReportController::class, 'index'])->name('report');

    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });
});

