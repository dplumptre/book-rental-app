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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('books',BookController::class);


Route::get('rentage/admin',[App\Http\Controllers\RentageController::class,'showAllRentalRequest']);
Route::get('rentage/',[App\Http\Controllers\RentageController::class,'showUserRentalRequest']);
Route::get('rentage/books',[App\Http\Controllers\RentageController::class,'books']);
Route::post('rentage/store',[App\Http\Controllers\RentageController::class,'store']);