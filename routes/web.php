<?php

use App\Http\Controllers\AdminModuleController;
use App\Http\Controllers\PythonModuleController;
use App\Http\Controllers\ReportModuleController;
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
Route::get('register', [UserModuleController::class, 'register'])->name('register');
Route::post('register', [UserModuleController::class, 'postRegister'])->name('register');
Route::get('logout', [UserModuleController::class, 'logout'])->name('logout');

Route::group(['as' => 'portal.', 'middleware' => ['auth']], function () {
    // Route::get('test', [PythonModuleController::class, 'readings']);
    Route::get('', [AdminModuleController::class, 'dashboard'])->name('dashboard');
    Route::get('sclae-readings', [AdminModuleController::class, 'scaleReading'])->name('scale.reading');
    Route::get('readings', [AdminModuleController::class, 'readings'])->name('readings');
    Route::get('second-readings/{id}', [AdminModuleController::class, 'secondReadings'])->name('second.readings');
    Route::post('second-readings/{id}', [AdminModuleController::class, 'secondReadingsPost'])->name('second.readings');
    Route::get('delete-readings/{id}', [AdminModuleController::class, 'deleteReadings'])->name('delete.readings');
    Route::get('capture-data', [AdminModuleController::class, 'captureData'])->name('capture.data');
    Route::post('capture-data', [AdminModuleController::class, 'captureDataSave'])->name('capture.data');
    Route::get('configurations', [AdminModuleController::class, 'configurations'])->name('configurations');
    Route::post('configurations', [AdminModuleController::class, 'postConfigurations'])->name('configurations');

    Route::group(['prefix' => 'users', 'as' => 'users.', 'middleware' => []], function () {
        Route::get('', [UserModuleController::class, 'index'])->name('index');
        Route::post('add', [UserModuleController::class, 'post'])->name('add');
        Route::get('delete/{id}', [UserModuleController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'reports', 'as' => 'reports.', 'middleware' => []], function () {
        Route::get('', [ReportModuleController::class, 'index'])->name('index');
        Route::get('readings-report', [ReportModuleController::class, 'readingReport'])->name('readings.report');
        Route::get('print-ink/{id}', [ReportModuleController::class, 'printInk'])->name('print.ink');
    });
    
    
});
