<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminController;

route::get('/', [homeController:: class, 'index'] );

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [homeController::class, 'redirect']);
route::get('/view_category', [AdminController::class, 'view_category']);
route::post('/add_category', [AdminController::class, 'add_category']);
route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
route::get('/view_product', [AdminController::class, 'view_product']);
route::post('/add_product', [AdminController::class, 'add_product']);
route::get('/manage_product', [AdminController::class, 'manage_product']);
route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
route::get('/update_product/{id}', [AdminController::class, 'update_product']);
route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);
