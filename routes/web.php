<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'as' => 'dashboard.', 'prefix' => 'dashboard'], function (){
    Route::group(['prefix' => 'users'], function (){
        Route::get('/', [App\Http\Controllers\Backend\UserController::class, 'index'])->name('user.index');
        Route::get('/create', [App\Http\Controllers\Backend\UserController::class, 'create'])->name('user.create');
        Route::get('{user}', [App\Http\Controllers\Backend\UserController::class, 'show'])->name('user.show');
        Route::post('/', [App\Http\Controllers\Backend\UserController::class, 'store'])->name('user.store');
        Route::get('/{user}/edit', [App\Http\Controllers\Backend\UserController::class, 'edit'])->name('user.edit');
        Route::patch('/{user}', [App\Http\Controllers\Backend\UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [App\Http\Controllers\Backend\UserController::class, 'delete'])->name('user.delete');
    });

    Route::group(['prefix' => 'companies'], function (){
        Route::get('/', [App\Http\Controllers\Backend\CompanyController::class, 'index'])->name('company.index');
        Route::get('/create', [App\Http\Controllers\Backend\CompanyController::class, 'create'])->name('company.create');
        Route::get('{company}', [App\Http\Controllers\Backend\CompanyController::class, 'show'])->name('company.show');
        Route::post('/', [App\Http\Controllers\Backend\CompanyController::class, 'store'])->name('company.store');
        Route::get('/{company}/edit', [App\Http\Controllers\Backend\CompanyController::class, 'edit'])->name('company.edit');
        Route::patch('/{company}', [App\Http\Controllers\Backend\CompanyController::class, 'update'])->name('company.update');
        Route::delete('/{company}', [App\Http\Controllers\Backend\CompanyController::class, 'delete'])->name('company.delete');
    });
});

