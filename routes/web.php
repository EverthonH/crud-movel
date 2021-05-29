<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MovelController;
use \App\Http\Controllers\UserController;
use App\Models\Movel;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::model('movel', Movel::class);
Route::put('/movel/{movel}/update', [MovelController::class, 'update'])
->name('update-movel')
->middleware('auth');
Route::get('/movel/remover/{movel}', [MovelController::class, 'destroy'])->name('rm-movel')->middleware('auth');
Route::post('/novo/movel', [MovelController::class, 'store'])->middleware('auth')
->name('add-movel');

require __DIR__.'/auth.php';
