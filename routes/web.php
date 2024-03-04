<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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

Route::get('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'login']);
Route::post('loginStore', [AuthController::class, 'store'])->name('loginStore');
Route::post('clientStore', [AuthController::class, 'registerStore'])->name('clientStore');
Route::post('organisateurStore', [AuthController::class, 'registerStore'])->name('organisateurStore');




Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');


Route::get('home', [\App\Http\Controllers\OrganisateurController::class, 'index'])->name('organisateur.home');


Route::get('event', [ClientController::class, 'event'])->name('client.event');
Route::get('reservation', [ClientController::class, 'reservation']);

