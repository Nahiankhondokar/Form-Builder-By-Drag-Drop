<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteNameController;
use App\Http\Controllers\UserInfoController;
use App\Models\Category;
use App\Models\FormTemplate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Category Create
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');

    // Form template Create
    Route::prefix('form-template')->group(function(){
        Route::get('/', [FormTemplateController::class, 'index'])->name('template.index');
        Route::get('/list/{id}', [FormTemplateController::class, 'show'])->name('template.show');
        Route::get('/delete/{formTemplate}', [FormTemplateController::class, 'delete'])->name('template.delete');
        Route::post('/store', [FormTemplateController::class, 'store'])->name('template.store');
    });

    // Rotue Create
    Route::prefix('route')->group(function(){
        Route::get('/', [RouteNameController::class, 'index'])->name('route.index');
        Route::post('/store', [RouteNameController::class, 'store'])->name('route.store');
        Route::get('/delete/{routeName}', [RouteNameController::class, 'delete'])->name('route.delete');
    });

    // Use info Create
    Route::prefix('user-info')->group(function(){
        Route::get('/', [UserInfoController::class, 'create'])->name('info.create');
        Route::post('/store', [UserInfoController::class, 'store'])->name('info.store');
        // Route::get('/delete/{userInfo}', [RouteNameController::class, 'delete'])->name('route.delete');
    });
});

require __DIR__.'/auth.php';
