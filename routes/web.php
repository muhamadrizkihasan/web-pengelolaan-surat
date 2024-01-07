<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
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

Route::middleware('IsGuest')->group(function() {

    Route::get('/', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'authLogin'])->name('auth-login');

});

Route::get('/error-permission', function () {
    return view('error-permission');
})->name('error-permission');

Route::middleware('IsLogin')->group(function() {

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('IsStaff')->group(function() {

        Route::prefix('/staff')->name('staff.')->group(function() {
            Route::get('/', [UserController::class, 'indexStaff'])->name('index');
            Route::get('/create', [UserController::class, 'createStaff'])->name('create');
            Route::post('/store', [UserController::class, 'storeStaff'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'editStaff'])->name('edit');
            Route::patch('/update/{id}', [UserController::class, 'updateStaff'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroyStaff'])->name('delete');
            Route::get('/search', [UserController::class, 'searchStaff'])->name('search');
        });

        Route::prefix('/guru')->name('guru.')->group(function() {
            Route::get('/', [UserController::class, 'indexGuru'])->name('index');
            Route::get('/create', [UserController::class, 'createGuru'])->name('create');
            Route::post('/store', [UserController::class, 'storeGuru'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'editGuru'])->name('edit');
            Route::patch('/update/{id}', [UserController::class, 'updateGuru'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroyGuru'])->name('delete');
            Route::get('/search', [UserController::class, 'searchGuru'])->name('search');
            // Route::get('/entries', [UserController::class, 'entriesGuru'])->name('entries');
        });

        Route::prefix('/klasifikasi')->name('klasifikasi.')->group(function() {
            Route::get('/', [LetterTypeController::class, 'index'])->name('index');
            Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
            Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
            Route::get('/show/{id}', [LetterTypeController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [LetterTypeController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [LetterTypeController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [LetterTypeController::class, 'destroy'])->name('delete');
            Route::get('/download-excel', [LetterTypeController::class, 'downloadExcel'])->name('download-excel');
            Route::get('/search', [LetterTypeController::class, 'search'])->name('search');
            Route::get('/surat/{id}', [LetterTypeController::class, 'surat'])->name('surat');
            Route::get('/download-pdf/{id}', [LetterTypeController::class, 'downloadPDF'])->name('download-pdf');
        });

        Route::prefix('/letter')->name('letter.')->group(function() {
            Route::get('/', [LetterController::class, 'index'])->name('index');
            Route::get('/cetak', [LetterController::class, 'cetak'])->name('cetak');
            Route::get('/surat/{id}', [LetterController::class, 'surat'])->name('surat');
            Route::get('/show/{id}', [LetterController::class, 'show'])->name('show');
            Route::get('/create', [LetterController::class, 'create'])->name('create');
            Route::post('/store', [LetterController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LetterController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [LetterController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [LetterController::class, 'destroy'])->name('delete');
            Route::get('/search', [LetterController::class, 'search'])->name('search');
            Route::get('/download-excel', [LetterController::class, 'downloadExcel'])->name('download-excel');
            Route::get('/download-pdf/{id}', [LetterController::class, 'downloadPDF'])->name('download-pdf');
        });

    });

    Route::middleware('IsGuru')->group(function() {
        Route::prefix('/result')->name('result.')->group(function() {
            Route::get('/create/{id}', [ResultController::class, 'create'] )->name('create');
            Route::post('/store', [ResultController::class, 'store'] )->name('store');
            Route::get('/show/{id}', [ResultController::class, 'show'] )->name('show');
        });
    });

});