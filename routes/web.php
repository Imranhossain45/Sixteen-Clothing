<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('index');
    
});
Route::controller(FrontendController::class)->group(function(){
    Route::get('/about', 'about')->name('about');
    Route::get('/products','product')->name('product');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contactStore', 'contactStore')->name('contactStore');
});
Route::middleware(['auth'])->group(
    function () {
        Route::get('/home', [HomeController::class, 'home'])->name('home');

        Route::controller(CategoryController::class)->name('backend.category.')->prefix('category')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{category}', 'edit')->name('edit');
            Route::post('/update/{category}', 'update')->name('update');
            Route::get('/destroy/{category}', 'destroy')->name('trash');
            Route::get('/status/{category}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('permDelete');
        });
        Route::controller(ProductController::class)->name('backend.product.')->prefix('product')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{product}', 'edit')->name('edit');
            Route::post('/update/{product}', 'update')->name('update');
            Route::get('/destroy/{product}', 'destroy')->name('trash');
            Route::get('/status/{product}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('permDelete');
        });
        Route::controller(ColorController::class)->name('backend.color.')->prefix('color')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{color}', 'edit')->name('edit');
            Route::post('/update/{color}', 'update')->name('update');
            Route::get('/destroy/{color}', 'destroy')->name('trash');
            Route::get('/status/{color}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('permDelete');
        });
        Route::controller(SizeController::class)->name('backend.size.')->prefix('size')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{size}', 'edit')->name('edit');
            Route::post('/update/{size}', 'update')->name('update');
            Route::get('/destroy/{size}', 'destroy')->name('trash');
            Route::get('/status/{size}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('permDelete');
        });
    });