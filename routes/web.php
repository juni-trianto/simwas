<?php

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
    return view('welcome');
});

// Auth::routes();
Auth::routes([
    // 'register' => false, // Registration Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// MENU
Route::get('/master/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::post('/mater/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.create');
Route::delete('/master/menu/destroy/{id}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');
Route::get('/master/menu/edit/{id}', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::put('/master/menu/edit/{id}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');


// USER
Route::get('/master/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/master/user/add', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/master/user/add', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::delete('/master/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('/master/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/master/user/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');


