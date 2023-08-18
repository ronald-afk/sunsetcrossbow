<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\itemCtrl;
use App\Http\Controllers\categoryCtrl;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\itemReturnController;
use App\Http\Controllers\laporanTransacController;
use App\Http\Controllers\transactionCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginCtrl;
use App\Http\Controllers\pegawaiCtrl;
use App\Http\Controllers\registerCtrl;
use App\Http\Controllers\stockController;
use App\Http\Controllers\supplierController;

// use App\Http\Controllers\regControl;

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



// <<<<<<< HEAD
// login and register  routes
// =======

Route::middleware('auth')->group(function (){
    

    Route::resource('/supplier',supplierController::class); 
    Route::resource('/dashboard',DashboardController::class);

    // Route::get('/exportItem', [stockController::class, 'export'])->name('export.item');
    // Route::get('/exportTransac/{time1}/{time2}/{user}', [laporanTransacController::class, 'transac'])->name('export.transac');
    // Route::resource('/mastertransaction', transactionCtrl::class);
    // Route::get('/laporan/{time1}/{time2}/{user}', [transactionCtrl::class, 'history']);
    // Route::get('/history', [transactionCtrl::class, 'laporan']);
    // Route::post('/mastertransaction/checkout',[transactionCtrl::class, 'checkout'])->name('transaction.checkout');
    // Route::resource('/mastercategory',categoryCtrl::class); 
  
    Route::post('/logout', [loginCtrl::class, 'logout']);    
});


// Route::get('',registerCtrl::class, 'index')->name('baru');
// Route::get('/reg', [regControl::class, 'index']);

Route::middleware('guest')->group(function(){
    
    // Route::get('/login', [loginCtrl::class, 'index']);
    Route::get('/login', [loginCtrl::class, 'index'])->name('login');
    Route::post('/login', [loginCtrl::class, 'authenticate'])->name('auth');


});

Route::middleware('pegawai')->group(function()
{
    // Route::resource('/masterbarang', BarangController::class);
    Route::get('/reset',[transactionCtrl::class, 'reset'])->name('transaction.reset');
    Route::get('/resetItem',[itemCtrl::class,'reset'])->name('item.reset');
    Route::resource('/laporantransaksi', laporanTransacController::class);
    Route::resource('/itemReturn', itemReturnController::class);
    Route::get('/returnExport',[itemReturnController::class,'exportReturn'])->name('export.return');
    Route::get('/ajax-autocomplete-search', [itemReturnController::class, 'selectSearch']);
    Route::get('/laporan/{time1}/{time2}/{user}', [transactionCtrl::class, 'history']);
    Route::get('/exportTransac/{time1}/{time2}/{user}', [laporanTransacController::class, 'transac'])->name('export.transac');  
    Route::get('/history', [transactionCtrl::class, 'laporan']);  
    Route::resource('/masteritem', itemCtrl::class);
    Route::resource('/mastercategory',categoryCtrl::class); 
    Route::resource('/laporantransaksi', laporanTransacController::class);
    Route::get('/exportItem', [stockController::class, 'export'])->name('export.item');
    // Route::get('/exportTransac/{time1}/{time2}/{user}', [laporanTransacController::class, 'transac'])->name('export.transac');
    Route::resource('/mastertransaction', transactionCtrl::class);
    // Route::get('/history', [transactionCtrl::class, 'laporan']);
    Route::post('/mastertransaction/checkout',[transactionCtrl::class, 'checkout'])->name('transaction.checkout');
    // Route::resource('/mastercategory',categoryCtrl::class);       
 
});

Route::middleware('admin')->group(function(){
    Route::resource('/register',registerCtrl::class); 
    Route::resource('/masterpegawai', pegawaiCtrl::class);

});

