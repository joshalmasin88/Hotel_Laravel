<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;

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
Route::get('create', [RoomsController::class, 'create']);
Route::post('post', [RoomsController::class, 'store']);

Route::get('book/{room}', [RoomsController::class, 'book']);
Route::post('booked', [RoomsController::class, 'booked']);