<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Library\Http\Controllers\BookCategoryController;
use Modules\Library\Http\Controllers\BookController;

Route::prefix('library')->group(function() {
    Route::get('/', 'LibraryController@index')->name('library');
});

Route::prefix('admin')->group(function() {

    // Book Category
    Route::get('library/bookCategory',[BookCategoryController::class,'index'])->name('bookCategory.index');
    Route::get('library/bookCategory/add',[BookCategoryController::class,'add'])->name('bookCategory.add');
    Route::post('library/bookCategory/store',[BookCategoryController::class,'store'])->name('bookCategory.store');
    Route::get('library/bookCategory/edit',[BookCategoryController::class,'edit'])->name('book-category.edit');
    // Route::get('library/bookCategory/edit/{id}','Backend\BookCategoryController@edit')->name('bookCategory.edit');
    Route::patch('library/bookCategory/{id}/update',[BookCategoryController::class,'update'])->name('bookCategory.update');
    Route::post('library/bookCategory/delete/{id}',[BookCategoryController::class,'destroy'])->name('bookCategory.delete');

    //Add New Book
    Route::get('library/books',[BookController::class,'index'])->name('allBooks.index');
    Route::get('library/allBooks',[BookController::class,'show'])->name('allBooks.show');
    Route::get('library/SearchBook',[BookController::class,'search'])->name('allBooks.search');
    Route::get('library/books/add',[BookController::class,'add'])->name('newBook.add');
    Route::post('library/books/store',[BookController::class,'store'])->name('newBook.store');
    Route::get('library/books/edit/{id}',[BookController::class,'edit'])->name('newBook.edit');
    Route::patch('library/books/{id}/update',[BookController::class,'update'])->name('newBook.update');
    Route::post('library/books/delete/{id}',[BookController::class,'destroy'])->name('newBook.delete');

    //issue/return books
    Route::get('library/issue_books',[BookController::class,'issueBook'])->name('issueBook.index');
    Route::post('library/issue-books/store',[BookController::class,'issueBookStore'])->name('issueBook.store');
    Route::get('library/return_books',[BookController::class,'returnBook'])->name('returnBook.index');
    Route::get('library/return_books-search',[BookController::class,'returnBookSearch'])->name('returnBook.search');
    Route::post('library/return-books/store',[BookController::class,'returnBookStore'])->name('returnBook.store');

    // report
    Route::get('library/report',[BookController::class,'report'])->name('report');

});
