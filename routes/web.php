<?php

use App\Http\Controllers\AdminModuleController;
use App\Http\Controllers\UserModuleController;
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
    // return view('welcome');
    return redirect()->route('login');
})->name('index');

Route::get('login', [UserModuleController::class, 'login'])->name('login');
Route::post('login', [UserModuleController::class, 'postLogin'])->name('login');
Route::get('logout', [UserModuleController::class, 'logout'])->name('logout');

Route::group(['as' => 'portal.', 'middleware' => ['auth']], function () {
    Route::get('', [AdminModuleController::class, 'dashboard'])->name('dashboard');
    Route::get('sclae-readings', [AdminModuleController::class, 'scaleReading'])->name('scale.reading');
    Route::get('capture-data', [AdminModuleController::class, 'captureData'])->name('capture.data');
    
    
});
