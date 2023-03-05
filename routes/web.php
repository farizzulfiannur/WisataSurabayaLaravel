<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\registerController;
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

// Home Route
Route::get('/',[homeController::class, 'home'])->name('home');

// Proses Registrasi
Route::get('/login',[loginController::class,'login'])->name('login');
Route::get('/register',[registerController::class,'register'])->name('register');
Route::post('/register/proses',[registerController::class,'prosesRegister'])->name('prosesRegister');

// Proses Login dengan admin atau contri
Route::post('/login/proses',[loginController::class,'prosesLogin'])->name('prosesLogin');
Route::get('contri',[homeController::class,'contri'])->name('contri')->middleware('auth','contri');
route::get('logout',[logoutController::class,'logout'])->name('logout');

// Admin
Route::get('admin',[homeController::class,'admin'])->name('admin')->middleware('auth','admin');

// Destinasi
Route::get('admin/destinasi',[adminController::class,'index'])->name('destinasi')->middleware('auth','admin');
Route::get('admin/destinasi/tambah',[adminController::class,'tambahDestinasi'])->name('tambahDestinasi')->middleware('auth','admin');
Route::post('admin/destinasi/store',[adminController::class,'store'])->name('storeDestinasi')->middleware('auth','admin');
Route::get('admin/destinasi/delete/{id}',[adminController::class,'delete'])->name('deleteDestinasi')->middleware('auth','admin');
Route::get('admin/destinasi/edit/{id}',[adminController::class,'edit'])->name('editDestinasi')->middleware('auth','admin');

// Event
Route::get('admin/event', [adminController::class, 'index_event'])->name('event')->middleware('auth', 'admin');
Route::get('admin/event/tambah', [adminController::class, 'tambahEvent'])->name('tambahEvent')->middleware('auth', 'admin');
Route::post('admin/event/store', [adminController::class, 'store_event'])->name('storeEvent')->middleware('auth', 'admin');
Route::get('admin/event/delete/{id}', [adminController::class, 'delete_event'])->name('deleteEvent')->middleware('auth', 'admin');
Route::get('admin/event/edit/{id}', [adminController::class, 'edit_Event'])->name('editEvent')->middleware('auth', 'admin');
