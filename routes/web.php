<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [HomeController::class, 'adminHome'])->name('admin.home');
// Route::get('/', [LoginController::class,'index'])->name('index');
// Route::middleware('auth')->group(function () {    
//     Route::post('/super-admin', [LoginController::class, 'superAdmin'])->name('super-admin');
//     Route::get('/admin-home', [HomeController::class, 'adminHome'])->name('admin-home');
// });

// Route::post('user-store', [HomeController::class, 'store'])->name('user-store');
// Route::post('/logout', [LoginController::class,'perform'])->name('logout');

Route::get('/', function(){
    return redirect()->route('admin.login');
} );


