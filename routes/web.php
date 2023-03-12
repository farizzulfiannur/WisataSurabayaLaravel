<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\contriController;
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

Route::get('/',[homeController::class,'home'])->name('home');

// Proses Registrasi
Route::get('/login',[loginController::class,'login'])->name('login');
Route::get('/register',[registerController::class,'register'])->name('register');
Route::post('/register/proses',[registerController::class,'prosesRegister'])->name('prosesRegister');

// Proses Login dengan admin atau contri
Route::post('/login/proses',[loginController::class,'prosesLogin'])->name('prosesLogin');
route::get('logout',[logoutController::class,'logout'])->name('logout');

// ============================================== //

// Admin
Route::get('admin',[homeController::class,'admin'])->name('admin')->middleware('auth','admin');

// Destinasi Admin
Route::get('admin/destinasi',[adminController::class,'index_dest'])->name('destinasi')->middleware('auth','admin');
Route::get('admin/destinasi/tambah',[adminController::class,'add_dest'])->name('addDestinasi')->middleware('auth','admin');
Route::post('admin/destinasi/store',[adminController::class,'store_dest'])->name('storeDestinasi')->middleware('auth','admin');
Route::get('admin/destinasi/delete/{id}',[adminController::class,'delete_dest'])->name('deleteDestinasi')->middleware('auth','admin');
Route::get('admin/destinasi/edit/{id}',[adminController::class,'edit_dest'])->name('editDestinasi')->middleware('auth','admin');

// Event
Route::get('admin/event', [EventController::class, 'index_event'])->name('event')->middleware('auth', 'admin');
Route::get('admin/event/tambah', [EventController::class, 'add_event'])->name('add_event')->middleware('auth', 'admin');
Route::post('admin/event/store', [EventController::class, 'store_event'])->name('store_event')->middleware('auth', 'admin');
Route::get('admin/event/delete/{id}', [EventController::class, 'delete_event'])->name('delete_event')->middleware('auth', 'admin');
Route::get('admin/event/edit/{id}', [EventController::class, 'edit_Event'])->name('edit_event')->middleware('auth', 'admin');

// ============================================== //

//Contri
Route::get('contri',[homeController::class,'contri'])->name('contri')->middleware('auth','contri');

//Destinasi Contri
// Route::get('contri/destinasi',[contriController::class,''])->name('contri_destinasi')->middleware('auth','contri');
// Route::get('contri/destinasi/tambah', [contriController::class,''])->name('contri_dest_tambah')->middleware('auth','contri');
// Route::get('contri/destinasi/store', [contriController::class,''])->name('contri_dest_store')->middleware('auth','contri');
// Route::get('contri/destinasi/edit/{id}', [contriController::class,''])->name('contri_dest_edit')->middleware('auth','contri');

//Event Contri
// Route::get('contri/event', [contriController::class,''])->name('contri_event')->middleware('auth','contri');
// Route::get('contri/event/tambah', [contriController::class, ''])->name('contri_event_tambah')->middleware('auth','contri');
// Route::get('contri/event/store', [contriController::class, ''])->name('contri_event_store')->middleware('auth','contri');
// Route::get('contri/event/edit/{id}', [contriController::class, ''])->name('contri__event_edit')->middleware('auth','contri');
