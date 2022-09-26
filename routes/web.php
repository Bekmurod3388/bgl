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
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/firms', function () {
    return view('firms');
})->middleware(['auth'])->name('firms');
Route::resource('work',\App\Http\Controllers\WorkController::class);


Route::resource('firms',\App\Http\Controllers\FirmController::class);
Route::resource('workers',\App\Http\Controllers\WorkerController::class);


require __DIR__.'/auth.php';
