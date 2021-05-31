<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;

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

Auth::routes();

Route::get('/', [RoomsController::class, 'index'])->name('home');
Route::get('room/{room}', [RoomsController::class, 'show']);

Route::get('book/{room}', [RoomsController::class, 'book']);
Route::post('booked', [ReservationController::class, 'booked']);

// Admin Routes
Route::get('staff', [RoomsController::class, 'staff']);
Route::get('create', [RoomsController::class, 'create']);
Route::post('post', [RoomsController::class, 'store']);
Route::get('edit/{room}', [RoomsController::class, 'edit']);
Route::put('update/{room}', [RoomsController::class, 'update']);
Route::delete('remove/{room}', [RoomsController::class, 'destroy']);

Route::get('pay', [PaymentController::class, 'index']);
Route::post('transaction', [PaymentController::class, 'makePayment'])->name('make-payment');