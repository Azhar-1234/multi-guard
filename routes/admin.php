<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;

/*
*
*
admin route
*/
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [LoginController::class, 'showLogin'])->name('login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware('admin')->group(function () {
        //Dashboard &  Admin Controller Refactored
        Route::controller(AdminController::class)->group(function(){
            //admin dashboard
            Route::get('dashboard', 'index')->name('dashboard');
            Route::post('/store','store')->name('store');
            Route::get('/role-show','roleShow')->name('role-show');
            Route::get('/role-list','roleIndex')->name('index');
            Route::get('/role-create','roleCreate')->name('role-create');
            Route::post('/role-store','roleStore')->name('role-store');
            Route::post('/role-update','roleUpdate')->name('role-update');
            Route::post('/role-status-update','roleStatusUpdate')->name('role-status.update');
            Route::get('/role-destroy/{id}','roleDestroy')->name('role-destroy');
            Route::get('/role-edit/{id}','roleEdit')->name('role-edit');
        });

    });
});

Route::prefix('/user')->name('user.')->group(function () {
    Route::get('user-login', [LoginController::class, 'userLogin'])->name('user-login');
    Route::post('authenticate', [LoginController::class, 'userAuthenticate'])->name('authenticate');
    Route::middleware('user')->group(function () {
        Route::get('index', [LoginController::class, 'userIndex'])->name('index');
    });

});