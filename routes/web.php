<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
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

// Контроллер для страниц смысла не увидел делать для текущей задачи(хотя на практите нужно все по местам раскладывать)
Route::get('', function () {
    return view('welcome');
});

Route::get('thank-you', function () {
    return view('thank-you');
})->name('thank-you');

Route::get('sorry', function (Request $request) {
    return view('sorry');
})->name('sorry');

Route::post('pay', [ApiController::class, 'callback'])->name('pay');


