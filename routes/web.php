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
})->name('welcome');

Route::get('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'login']);
Route::post('loginStore', [AuthController::class, 'store'])->name('loginStore');
Route::post('clientStore', [AuthController::class, 'registerStore'])->name('clientStore');
Route::post('organisateurStore', [AuthController::class, 'registerStore'])->name('organisateurStore');


Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('event', [ClientController::class, 'event'])->name('client.event');
    Route::get('reservation', [ClientController::class, 'reservation']);
    Route::post('reservation.store', [\App\Http\Controllers\ReservationController::class, 'create'])->name('reservation.store');
    Route::get('client.search', [\App\Http\Controllers\SearchController::class, 'search'])->name('client.search');
    Route::post('/download-ticket/{reservationId}', [ClientController::class, 'downloadTicket'])->name('download-ticket');

});

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('home', [\App\Http\Controllers\OrganisateurController::class, 'index'])->name('organisateur.home');
    Route::post('/events-store', [\App\Http\Controllers\EventController::class, 'store'])->name('events-store');
    Route::delete('/organisateur/deleteEvent/{event}', [\App\Http\Controllers\EventController::class, 'deleteEvent'])->name('organisateur.deleteEvent');
    Route::post('/organisateur/accept-reservation/{reservationId}', [\App\Http\Controllers\OrganisateurController::class, 'acceptReservation'])->name('organisateur.acceptReservation');
    Route::delete('/organisateur/decline-reservation/{reservationId}', [\App\Http\Controllers\OrganisateurController::class, 'deleteReservation'])->name('organisateur.declineReservation');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('category', [\App\Http\Controllers\AdminController::class, 'category'])->name('admin.category');
    Route::post('/admin/accept-event/{eventId}', [\App\Http\Controllers\AdminController::class, 'acceptEvent'])->name('admin.acceptEvent');
    Route::delete('/admin/decline-event/{eventId}', [\App\Http\Controllers\AdminController::class, 'declineEvent'])->name('admin.declineEvent');
    Route::get('users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
});
