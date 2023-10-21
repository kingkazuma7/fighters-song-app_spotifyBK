<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FighterController;

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

Route::get('/fighters/create', [FighterController::class, 'create'])->name('fighters.create');
Route::get('/fighters', [FighterController::class, 'index'])->name('fighters.index');
Route::post('/fighters', [FighterController::class, 'store'])->name('fighters.store');

Route::get('/', function () {
    return view('welcome');
});
