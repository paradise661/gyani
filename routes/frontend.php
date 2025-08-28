<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/blog/{slug}', [FrontendController::class, 'blogsingle'])->name('blogsingle');
Route::get('/services/{slug}', [FrontendController::class, 'servicesingle'])->name('servicesingle');
Route::get('/packages/{slug}', [FrontendController::class, 'packagesingle'])->name('packagesingle');
Route::get('/category/{slug}', [FrontendController::class, 'categorysingle'])->name('categorysingle');
Route::get('/{slug}', [FrontendController::class, 'pagesingle'])->name('pagesingle');
Route::get('/print/{package}', [FrontendController::class, 'printPdf'])->name('print');


Route::post('/inquiry/contact', [ContactsController::class, 'inquiry'])->name('inquiry');
Route::post('/inquiry/popupcontact', [ContactsController::class, 'popupinquiry'])->name('popupinquiry');
Route::post('/inquiry/book', [BookingController::class, 'book'])->name('book');
Route::post('/inquiry/popupbook', [BookingController::class, 'popupbook'])->name('popupbook');
