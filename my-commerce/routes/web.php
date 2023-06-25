<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

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
Route::get('/product-category/{id}', [MyCommerceController::class, 'productCategory'])->name('category');
Route::get('/product-subcategory/{id}', [MyCommerceController::class, 'productSubCategory'])->name('subcategory');
Route::get('/details/{id}', [MyCommerceController::class, 'details'])->name('details');
Route::get('/show-cart', [CartController::class, 'show'])->name('show-cart');
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add.cart.product');
Route::post('/update-cart/{id}', [CartController::class, 'update'])->name('update.cart.product');
Route::get('/add-to-cart-cart/{id}', [CartController::class, 'removeFromCart'])->name('delete.from.cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::post('new-cash-order', [CheckoutController::class, 'newCashOrder'])->name('new.cash-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete.order');

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

    //SubCategory Module

    Route::get('/subcategory/add', [SubCategoryController::class, 'index'])->name('add.subcategory');
    Route::get('/subcategory/manage', [SubCategoryController::class, 'manage'])->name('manage.subcategory');
    Route::post('/subcategory/new', [SubCategoryController::class, 'newSubCategory'])->name('subcategory.new');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('subcategory.edit');
    Route::post('/subcategory/update', [SubCategoryController::class, 'updateSubCategory'])->name('subcategory.update');
    Route::get('/subcategory/status-change/{id}', [SubCategoryController::class, 'statusSubCategory'])->name('subcategory.status');
    Route::post('/subcategory/delete', [SubCategoryController::class, 'deleteSubCategory'])->name('subcategory.delete');

    //Brand Module

    Route::get('/brand/add', [BrandController::class, 'index'])->name('add.brand');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('manage.brand');
    Route::post('/brand/new', [BrandController::class, 'newBrand'])->name('brand.new');
    Route::get('/brand/edit/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');
    Route::post('/brand/update', [BrandController::class, 'updateBrand'])->name('brand.update');
    Route::get('/brand/status-change/{id}', [BrandController::class, 'statusBrand'])->name('brand.status');
    Route::post('/brand/delete', [BrandController::class, 'deleteBrand'])->name('brand.delete');

    //Unit Module

    Route::get('/unit/add', [UnitController::class, 'index'])->name('add.unit');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('manage.unit');
    Route::post('/unit/new', [UnitController::class, 'newUnit'])->name('unit.new');
    Route::get('/unit/edit/{id}', [UnitController::class, 'editUnit'])->name('unit.edit');
    Route::post('/unit/update', [UnitController::class, 'updateUnit'])->name('unit.update');
    Route::get('/unit/status-change/{id}', [UnitController::class, 'statusUnit'])->name('unit.status');
    Route::post('/unit/delete', [UnitController::class, 'deleteUnit'])->name('unit.delete');

    //product Module

    Route::get('/product/add', [ProductController::class, 'index'])->name('add.product');
    Route::get('/product/get-subcategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::get('/product/manage', [ProductController::class, 'manage'])->name('manage.product');
    Route::post('/product/new', [ProductController::class, 'store'])->name('product.new');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/status-change/{id}', [ProductController::class, 'status'])->name('product.status');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('product.delete');
});
