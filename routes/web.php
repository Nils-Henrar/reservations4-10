<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\ShowController;



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
| Locality Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Locality resource.
|
*/

Route::get('/locality', [LocalityController::class, 'index'])->name('locality.index');

Route::get('/locality/create', [LocalityController::class, 'create'])->name('locality.create');

Route::post('/locality', [LocalityController::class, 'store'])->name('locality.store');

Route::get('/locality/{id}', [LocalityController::class, 'show'])->where('id', '[0-9]+')->name('locality.show');

Route::get('/locality/{id}/edit', [LocalityController::class, 'edit'])->where('id', '[0-9]+')->name('locality.edit');

Route::put('/locality/{id}', [LocalityController::class, 'update'])->where('id', '[0-9]+')->name('locality.update');

Route::delete('/locality/{id}', [LocalityController::class, 'delete'])->where('id', '[0-9]+')->name('locality.delete');


/*
|--------------------------------------------------------------------------
| Location Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Location resource.
|
*/

Route::get('/location', [LocationController::class, 'index'])->name('location.index');

Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');

Route::post('/location', [LocationController::class, 'store'])->name('location.store');

Route::get('/location/{id}', [LocationController::class, 'show'])->where('id', '[0-9]+')->name('location.show');

Route::get('/location/{id}/edit', [LocationController::class, 'edit'])->where('id', '[0-9]+')->name('location.edit');

Route::put('/location/{id}', [LocationController::class, 'update'])->where('id', '[0-9]+')->name('location.update');

Route::delete('/location/{id}', [LocationController::class, 'delete'])->where('id', '[0-9]+')->name('location.delete');


/*
|--------------------------------------------------------------------------
| Representation Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Representation resource.
|
*/

Route::get('/representation', [RepresentationController::class, 'index'])->name('representation.index');

Route::get('/representation/create', [RepresentationController::class, 'create'])->name('representation.create');

Route::post('/representation', [RepresentationController::class, 'store'])->name('representation.store');

Route::get('/representation/{id}', [RepresentationController::class, 'show'])->where('id', '[0-9]+')->name('representation.show');

Route::get('/representation/{id}/edit', [RepresentationController::class, 'edit'])->where('id', '[0-9]+')->name('representation.edit');

Route::put('/representation/{id}', [RepresentationController::class, 'update'])->where('id', '[0-9]+')->name('representation.update');

Route::delete('/representation/{id}', [RepresentationController::class, 'delete'])->where('id', '[0-9]+')->name('representation.delete');

/*
|--------------------------------------------------------------------------
| Show Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Show resource.
|
*/

Route::get('/show', [ShowController::class, 'index'])->name('show.index');

Route::get('/show/create', [ShowController::class, 'create'])->name('show.create');

Route::post('/show', [ShowController::class, 'store'])->name('show.store');

Route::get('/show/{id}', [ShowController::class, 'show'])->where('id', '[0-9]+')->name('show.show');

Route::get('/show/{id}/edit', [ShowController::class, 'edit'])->where('id', '[0-9]+')->name('show.edit');

Route::put('/show/{id}', [ShowController::class, 'update'])->where('id', '[0-9]+')->name('show.update');

Route::delete('/show/{id}', [ShowController::class, 'delete'])->where('id', '[0-9]+')->name('show.delete');




/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Role resource.
|
*/

Route::get('/role', [RoleController::class, 'index'])->name('role.index');

Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');

Route::post('/role', [RoleController::class, 'store'])->name('role.store');

Route::get('/role/{id}', [RoleController::class, 'show'])->where('id', '[0-9]+')->name('role.show');

Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->where('id', '[0-9]+')->name('role.edit');

Route::put('/role/{id}', [RoleController::class, 'update'])->where('id', '[0-9]+')->name('role.update');

Route::delete('/role/{id}', [RoleController::class, 'delete'])->where('id', '[0-9]+')->name('role.delete');







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
