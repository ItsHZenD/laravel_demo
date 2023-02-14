<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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
Route::get('/',[UserController::class, 'index']);
Route::get('/create',[UserController::class, 'create'])->name('create');
Route::post('/store',[UserController::class, 'store'])->name('store');




Route::resource('books', BookController::class)
    ->except(
        'show',
    );

// Route::group(['prefix' => 'books', 'as' =>  'book.'], function(){
//     Route::get('/', [BookController::class, 'index'])->name('index');
//     Route::get('/create', [BookController::class, 'create'])->name('create');
//     Route::post('/create',[BookController::class, 'store'])->name('store');
//     Route::get('/edit/{book}',[BookController::class, 'edit'])->name('edit');
//     Route::put('/edit/{book}',[BookController::class, 'update'])->name('update');
//     Route::delete('/destroy/{book}',[BookController::class, 'destroy'])->name('destroy');
// });
