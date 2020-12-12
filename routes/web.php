<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Models\member;

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

Route::get('/borrowings/membername/{id}', [borrowingController::class, 'membername']);
Route::get('/borrowings/bookname/{id}', [borrowingController::class, 'bookname']);
Route::get('/borrowings/returndate/{id}', [borrowingController::class, 'returndate']);
Route::get('/borrowings/bookcategory/{id}', [borrowingController::class, 'bookcategory']);
Route::get('/borrowings/bookcategory/{id}', [borrowingController::class, 'bookcategory']);
Route::get('/borrowings/allborrow/', [borrowingController::class, 'allborrow']);

Route::put('/borrowings/storeBorrowingStatus/{id}', [borrowingController::class, 'storeBorrowingStatus']);
Route::put('/borrowings/storeBorrowingStatusLate/{id}', [borrowingController::class, 'storeBorrowingStatusLate']);

 
Route::resource('books', BookController::class);
Route::resource('borrowings', BorrowingController::class);
Route::resource('categories', CategoryController::class);
Route::resource('members', MemberController::class);
