<?php
use Illuminate\Support\Facades\Route;

Route::resource('categories','CategoryController');
Route::resource('books','BookController');
Route::resource('homes','HomeController');
Route::resource('carts','CartController');

Route::post('/searchRes','BookController@searchRes')->name('searchRes');

// Route::post('/cart','CartController@addToCart')->name('cart.store');



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

Auth::routes();
Route::get('/admin', function () {
    return view('gestion');
})->name('admin');
Route::get('/about', function () {return view('Aboutus');})->name("about");
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/list', [App\Http\Controllers\ArticleController::class, 'index'])->name('list');
