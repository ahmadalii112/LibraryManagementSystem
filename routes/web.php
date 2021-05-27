<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\BooksController;
use  App\Http\Controllers\AuthorController;
use  App\Http\Controllers\IssueController;
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


Route::resource('books',BooksController::class);
Route::resource('author',AuthorController::class);
Route::resource('issue',IssueController::class);
Route::get('issue/return/book',[IssueController::class,'returnBook'])->name('issue.return');
Route::get('show/return/book/{book}',[IssueController::class,'showBook'])->name('show.book');

Route::put('calculateFine/{calculateFine}',[IssueController::class,'fine'])->name('issue.fine');


Route::get('get/book/{author_id}',[IssueController::class,'getbook']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/a', [App\Http\Controllers\Shelves::class, 'shelveA'])->name('shelves.a');
Route::get('/b', [App\Http\Controllers\Shelves::class, 'shelveB'])->name('shelves.b');
Route::get('/c', [App\Http\Controllers\Shelves::class, 'shelveC'])->name('shelves.c');
Route::get('shelves/books', [App\Http\Controllers\Shelves::class, 'books'])->name('shelves.books');
Route::post('shelves', [App\Http\Controllers\Shelves::class, 'store'])->name('shelves.store');
