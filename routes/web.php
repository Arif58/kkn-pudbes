<?php

// use App\Http\Controllers\DashboardAdmin\TourismController;

use App\Http\Controllers\DashboardAdmin\TourismController as AdminDashboardTourismController;
use App\Http\Controllers\DashboardAdmin\TourismImageController as AdminDashboardTourismImageController;
use App\Http\Controllers\DashboardAdmin\ProfileController as AdminDashboardProfileController;
use App\Http\Controllers\Client\CalculationController as ClientCalculationController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Client\FoodController as ClientFoodController;
use App\Http\Controllers\Client\ProfileController as ClientProfileController;
use App\Http\Controllers\Client\PotensiWisataController as ClientPotensiWisataController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [ClientProfileController::class, 'index'])->name('home');

Route::get('/potensi_wisata', [ClientPotensiWisataController::class, 'index']);

Route::group(['prefix' => 'kalori'], function() {
    Route::get('/', [ClientFoodController::class, 'index']);
    Route::post('/calculator', [ClientFoodController::class, 'calculate']);
});

Route::group(['prefix' => 'akg'], function() {
    Route::get('/', [ClientCalculationController::class, 'index']);
    Route::post('/calculator', [ClientCalculationController::class, 'calculate'])->name('calculation.calculate');
});
Route::group(['prefix' => 'login'], function() {
    Route::get('/', [AuthLoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/', [AuthLoginController::class, 'authenticate']);
});
Route::post('/logout', [AuthLoginController::class, 'logout'])->middleware('auth');

// Route::get('/', function() {
//     return view('welcome');
// });

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    // menu wisata
    Route::group(['prefix' => 'wisata'], function (){
        Route::get('/', [AdminDashboardTourismController::class, 'index'])->name('wisate.index');
        Route::get('/create', [AdminDashboardTourismController::class, 'create'])->name('wisata.create');
        Route::post('/', [AdminDashboardTourismController::class, 'store'])->name('wisata.store');
        Route::get('/edit/{id}', [AdminDashboardTourismController::class, 'edit'])->name('wisata.edit');
        Route::post('/update/{id}', [AdminDashboardTourismController::class, 'update'])->name('wisata.update');
        Route::post('/delete/{id}', [AdminDashboardTourismController::class, 'destroy'])->name('wisata.destroy');
        Route::get('/images/{id}', [AdminDashboardTourismImageController::class, 'index'])->name('display.images');
        Route::post('/image/delete/{tourism_id}/{id}', [AdminDashboardTourismImageController::class, 'destroy'])->name('image.destroy');
        Route::post('/image/add/{id}', [AdminDashboardTourismImageController::class, 'create'])->name('image.add');
    
    });
    //menu profile
    Route::group(['prefix' => 'profile'], function (){
        Route::get('/', [AdminDashboardProfileController::class, 'index'])->name('profile.index');
        Route::post('/edit/desc/{id}', [AdminDashboardProfileController::class, 'update_desc'])->name('desc.update');
        Route::post('/edit/history/{id}', [AdminDashboardProfileController::class, 'update_history'])->name('history.update');
        Route::post('/edit/visi/{id}', [AdminDashboardProfileController::class, 'update_visi'])->name('visi.update');
        Route::post('/edit/misi/{id}', [AdminDashboardProfileController::class, 'update_misi'])->name('misi.update');
    });
});