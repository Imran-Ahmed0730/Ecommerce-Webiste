<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

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
Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/category', [MyCommerceController::class, 'category'])->name('category');
Route::get('/details', [MyCommerceController::class, 'details'])->name('details');
Route::get('/show-cart', [CartController::class, 'index'])->name('show-cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   //Category Module

    Route::get('/category/add', [CategoryController::class, 'index'])->name('add.category');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('manage.category');
    Route::post('/category/new', [CategoryController::class, 'newCategory'])->name('category.new');
    Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::get('/category/status-change/{id}', [CategoryController::class, 'statusCategory'])->name('category.status');
    Route::post('/category/delete', [CategoryController::class, 'deleteCategory'])->name('category.delete');

});
