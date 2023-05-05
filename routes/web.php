<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ShareController;


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
    return view('app.home');
});

Route::get('/dashboard', [DashController::class, 'index'])->middleware('auth');
Route::get('/dashboard/create', [DashController::class, 'create'])->middleware('auth');
Route::post('/dashboard/store', [DashController::class, 'store'])->middleware('auth');
Route::get('/share/{id_enquete}/{id_usuario}', [ShareController::class, 'render']);
Route::post('/share/vote/{id_enquete}/{id_usuario}', [ShareController::class, 'vote']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    return view('app.home');
});
