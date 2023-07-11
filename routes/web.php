<?php

// use App\Http\Controllers\DashboardAdmin\TourismController;

use App\Http\Controllers\DashboardAdmin\TourismController as AdminDashboardTourismController;
use App\Http\Controllers\CalculationController;
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
    // Route::get('/wisata', 'DashboardAdmin\TourismController@index')->name('wisata.index');
    Route::get('/wisata', [AdminDashboardTourismController::class, 'index'])->name('wisate.index');
    Route::get('/wisata/create', [AdminDashboardTourismController::class, 'create'])->name('wisata.create');
    Route::post('/wisata', [AdminDashboardTourismController::class, 'store'])->name('wisata.store');
<<<<<<< Updated upstream
});
=======
});

Route::get('/list', function(){
    return view('kalori.list');
});

Route::get('/akg', function(){
    return view('kalori.akg');
});

Route::post('/makanan', [CalculationController::class, 'calculate'])->name('calculation.calculate');
>>>>>>> Stashed changes
