<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LojaController::class, 'viewHome']);
Route::get('/game/{id}', [LojaController::class, 'viewGame']);
Route::get('/games/catalogs', [LojaController::class, 'viewCatalog'])->name('catalogo');
Route::get('/cart', [LojaController::class, 'viewCart']);
Route::post('/cart/add', [LojaController::class, 'addToCart']);
Route::post('/cart/remove', [LojaController::class, 'removeToCart']);

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/account/details', [ProfileController::class, 'viewProfile']);
    Route::get('/account/requests', [ProfileController::class, 'viewRequests']);
    Route::get('/account/wishlist', [ProfileController::class, 'viewWishlist']);
    Route::post('/fav/game/{id}', [ProfileController::class, 'favGame']);
    Route::post('/disfavor/game/{id}', [ProfileController::class, 'disfavorGame']);
});

Route::get('auth/google', [ProfileController::class, 'signInwithGoogle']);
Route::get('callback/google', [ProfileController::class, 'callbackToGoogle']);

Route::get('/admin', [AdminController::class, 'viewAdmin']);

Route::get('/admin/game/list', [AdminController::class, 'viewGameList']);
Route::get('/admin/create/game', [AdminController::class, 'viewCreateGame']);
Route::post('/admin/create/game', [AdminController::class, 'createGame']);
Route::get('/admin/edit/game/{id}', [AdminController::class, 'viewEditGame']);
Route::put('/admin/edit/game/{id}', [AdminController::class, 'editGame']);
Route::delete('/admin/delete/game/{id}', [AdminController::class, 'deleteGame']);

Route::get('/admin/list/carousel', [AdminController::class, 'viewListCarousel']);
Route::get('/admin/create/carousel', [AdminController::class, 'viewCreateCarousel']);
Route::post('/admin/create/carousel', [AdminController::class, 'createCarousel']);
Route::get('/admin/edit/carousel/{id}', [AdminController::class, 'viewEditCarousel']);
Route::put('/admin/edit/carousel/{id}', [AdminController::class, 'editCarousel']);
Route::delete('/admin/delete/carousel/{id}', [AdminController::class, 'deleteCarousel']);

Route::get('/admin/highlight/list', [AdminController::class, 'viewGameHighlight']);
Route::post('/admin/highlight/list', [AdminController::class, 'createHighlight']);
Route::delete('/admin/delete/highlight/{id}', [AdminController::class, 'deleteHighlight']);

Route::get('/admin/gender/list', [AdminController::class, 'viewGenderList']);
Route::post('/admin/gender/list', [AdminController::class, 'createGender']);
Route::delete('/admin/delete/gender/{id}', [AdminController::class, 'deleteGender']);

require __DIR__.'/auth.php';
