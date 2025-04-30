<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\ArtikelsController;
use App\Http\Controllers\FrontController;

use App\Http\Middleware\isAdmin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', FrontController::class);
Route::resource('new', FrontController::class);


Route::prefix('admin')->middleware('auth',isAdmin::class)->group(function() {
    Route::resource('kategori', KategorisController::class);
    Route::resource('artikel', ArtikelsController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
