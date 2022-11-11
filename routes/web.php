<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/



Route::middleware('auth')->group(function () {
    Route::get('/',[\App\Http\Controllers\StatisticController::class,'index'])->name('statistic.index');
//    Route::get('/',function (){ return view('adminpanel.master'); });
    Route::resource('firms', \App\Http\Controllers\FirmController::class);
    Route::resource('worker', \App\Http\Controllers\WorkerController::class);
    Route::resource('work',\App\Http\Controllers\WorkController::class);
    Route::get('firm_incomes/download',[\App\Http\Controllers\FirmIncomeController::class, 'download'])->name('firm_incomes.download');
    Route::resource('firm_incomes',\App\Http\Controllers\FirmIncomeController::class);
    Route::get('firm_provided/download',[\App\Http\Controllers\FirmProvidedController::class, 'download'])->name('firm_provided.download');
    Route::resource('firm_provided',\App\Http\Controllers\FirmProvidedController::class);
    Route::resource('type',\App\Http\Controllers\TypeController::class);
    Route::resource('worker_gaves',\App\Http\Controllers\WorkerGaveController::class);
    Route::resource('jobs',\App\Http\Controllers\JobsController::class);
    Route::resource('products',\App\Http\Controllers\ProductController::class);
    Route::resource('gaz',\App\Http\Controllers\GazController::class);
    Route::resource('electric_current',\App\Http\Controllers\ElectricCurrentController::class);

    Route::resource('outlay',\App\Http\Controllers\OutlayController::class);

    Route::resource('sells',\App\Http\Controllers\SellController::class);
    Route::resource('sell_incomes',\App\Http\Controllers\SellIncomeController::class);
    Route::resource('sell_provided',\App\Http\Controllers\SellProvidedController::class);
    Route::resource('finished_products',\App\Http\Controllers\FinishedProductController::class);
    Route::resource('warehouses',\App\Http\Controllers\WarehouseController::class);
    Route::post('search',[\App\Http\Controllers\StatisticController::class, 'search'])->name('search');
    Route::get('statistic/all',[\App\Http\Controllers\StatisticController::class, 'all'])->name('all');

});


require __DIR__.'/auth.php';

