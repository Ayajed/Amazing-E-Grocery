<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('/sesi/home');
})->middleware('isGuest');

Route::resource('bahan', BahanController::class)->middleware('isLogin');
Route::get('/sesi', [SessionController::class, 'index'])->middleware('isGuest');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isGuest');
Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isGuest');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isGuest');
