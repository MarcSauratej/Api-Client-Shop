<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/history', [DashboardController::class, 'history'])->name('history');

Route::get('/shop', [DashboardController::class, 'index'])->name('shop');

Route::get('/shop/{book}', [DashboardController::class, 'view'])->name('shop.view');

Route::post('/card', [DashboardController::class, 'shop'])->name('shop.shop');

//rutas de Book
Route::get('/book', [BookController::class, 'index'])->name('book.index');

Route::post('/book', [BookController::class, 'store'])->name('book.store');

Route::get('/book/{book}', [BookController::class, 'view'])->name('book.view');

Route::post('/book/update', [BookController::class, 'update'])->name('book.update');

Route::get('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');


//rutas de Providers
Route::get('/provider', [ProviderController::class, 'index'])->name('provider.index');

Route::post('/provider', [ProviderController::class, 'store'])->name('provider.store');

Route::get('/provider/{provider}', [ProviderController::class, 'view'])->name('provider.view');

Route::post('/provider/update', [ProviderController::class, 'update'])->name('provider.update');

Route::get('/provider/delete/{id}', [ProviderController::class, 'delete'])->name('provider.delete');

//rutas tienda

require __DIR__.'/auth.php';
