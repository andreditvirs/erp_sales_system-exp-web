<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
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

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function(){
        Route::get('get-data', [CustomerController::class, 'getData'])->name('getData');
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::get('/edit/{id?}', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/{id?}', [CustomerController::class, 'update'])->name('update');
        Route::delete('/{id?}', [CustomerController::class, 'destroy'])->name('delete');
    });
    
    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('get-data', [ProductController::class, 'getData'])->name('getData');
        Route::get('get-detail/{id?}', [ProductController::class, 'getDetail'])->name('getDetail');
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/edit/{id?}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id?}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id?}', [ProductController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'invoice', 'as' => 'invoice.'], function(){
        Route::get('get-data', [InvoiceController::class, 'getData'])->name('getData');
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::post('/', [InvoiceController::class, 'store'])->name('store');
        Route::get('/create', [InvoiceController::class, 'create'])->name('create');
        Route::get('/edit/{id?}', [InvoiceController::class, 'edit'])->name('edit');
        Route::put('/{id?}', [InvoiceController::class, 'update'])->name('update');
        Route::delete('/{id?}', [InvoiceController::class, 'destroy'])->name('delete');
    });
});
