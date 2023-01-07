<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentageController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

/***
 *  Admin
 *
 * */
Route::resource('books', BookController::class);
Route::get('rentage/admin', [
    App\Http\Controllers\RentageController::class,
    'showAllRentalRequest',
]);
Route::patch('rentage/status/{rentage}', [
    App\Http\Controllers\RentageController::class,
    'RentageStatus',
])->name('rentage.status');

/***
 *  Users
 *
 * */

Route::get('rentage/books', [
    App\Http\Controllers\RentageController::class,
    'books',
]);
Route::get('rentage/', [
    App\Http\Controllers\RentageController::class,
    'showUserRentalRequest',
]);
Route::get('rentage/{book}', [
    App\Http\Controllers\RentageController::class,
    'showUserRentedBook',
]);
Route::post('rentage/store', [
    App\Http\Controllers\RentageController::class,
    'store',
]);

Route::post('rentage/review/store', [
    App\Http\Controllers\RentageController::class,
    'storeReview',
]);
