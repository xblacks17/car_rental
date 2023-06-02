<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\VehicleController;

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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//prefix admin


Route::middleware([
    'auth:sanctum',
])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');


        Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
        Route::post('companies', [CompanyController::class, 'store'])->name('companies.add');
        Route::put('companies/{company}', [CompanyController::class, 'edit'])->name('companies.edit');
        Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->name('companies.delete');

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::post('users', [UserController::class, 'store'])->name('users.add');
        Route::put('users/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.delete');

        Route::get('cars', [VehicleController::class, 'index'])->name('cars.index');
        Route::post('cars', [VehicleController::class, 'store'])->name('cars.add');
        Route::put('cars/{car}', [VehicleController::class, 'edit'])->name('cars.edit');
        Route::delete('cars/{car}', [VehicleController::class, 'destroy'])->name('cars.delete');

      
        Route::get('/books', function () {
            return Inertia::render('Admin/Books');
        })->name('books');
    });
});
