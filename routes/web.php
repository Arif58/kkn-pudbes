<?php

// use App\Http\Controllers\DashboardAdmin\TourismController;

use App\Http\Controllers\DashboardAdmin\TourismController as AdminDashboardTourismController;
use App\Http\Controllers\Client\CalculationController as ClientCalculationController;
use App\Http\Controllers\Client\FoodController as ClientFoodController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/wisata', [AdminDashboardTourismController::class, 'index'])->name('wisate.index');
    Route::get('/wisata/create', [AdminDashboardTourismController::class, 'create'])->name('wisata.create');
    Route::post('/wisata', [AdminDashboardTourismController::class, 'store'])->name('wisata.store');
});

Route::group(['prefix' => 'kalori'], function() {
    Route::get('/', [ClientFoodController::class, 'index']);
    Route::post('/calculator', [ClientFoodController::class, 'calculate']);
});

Route::group(['prefix' => 'akg'], function() {
    Route::get('/', [ClientCalculationController::class, 'index']);
    Route::post('/calculator', [ClientCalculationController::class, 'calculate'])->name('calculation.calculate');
});