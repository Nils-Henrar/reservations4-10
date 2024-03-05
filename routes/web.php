<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Auth;
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

/*
|--------------------------------------------------------------------------
| Artist Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Artist resource.
|
*/

Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');

Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');

Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');

Route::get('/artist/{id}', [ArtistController::class, 'show'])->where('id', '[0-9]+')->name('artist.show');

Route::get('/artist/{id}/edit', [ArtistController::class, 'edit'])->where('id', '[0-9]+')->name('artist.edit');

Route::put('/artist/{id}', [ArtistController::class, 'update'])->where('id', '[0-9]+')->name('artist.update');

Route::delete('/artist/{id}', [ArtistController::class, 'delete'])->where('id', '[0-9]+')->name('artist.delete');






/*
|--------------------------------------------------------------------------
| Type Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Type resource.
|
*/

Route::get('/type', [TypeController::class, 'index'])->name('type.index');

Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');

Route::post('/type', [TypeController::class, 'store'])->name('type.store');

Route::get('/type/{id}', [TypeController::class, 'show'])->where('id', '[0-9]+')->name('type.show');

Route::get('/type/{id}/edit', [TypeController::class, 'edit'])->where('id', '[0-9]+')->name('type.edit');

Route::put('/type/{id}', [TypeController::class, 'update'])->where('id', '[0-9]+')->name('type.update');

Route::delete('/type/{id}', [TypeController::class, 'delete'])->where('id', '[0-9]+')->name('type.delete');



/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Auth resource.
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
