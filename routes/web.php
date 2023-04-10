<?php

use App\Http\Controllers\AddImageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\imageController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// Add Image
Route::get('/addImage', [AddImageController::class, 'index'])->middleware(['auth']);
Route::get('/addImage/create', [AddImageController::class, 'create'])->middleware(['auth']);
Route::post('/addImage', [AddImageController::class, 'store'])->middleware(['auth']);
Route::get('/addImage/{id}/edit', [AddImageController::class, 'edit'])->middleware(['auth']);
Route::put('/addImage/{id}', [AddImageController::class, 'update'])->middleware(['auth']);
Route::delete('/addImage/{id}', [AddImageController::class, 'destroy'])->middleware(['auth']);



// Author
Route::get('/author', [AuthController::class, 'index'])->middleware(['auth']);
Route::get('/author/create', [AuthController::class, 'create'])->middleware(['auth']);
Route::post('/author', [AuthController::class, 'store'])->middleware(['auth']);
Route::get('/author/{id}/edit', [AuthController::class, 'edit'])->middleware(['auth']);
Route::put('/author/{id}', [AuthController::class, 'update'])->middleware(['auth']);
Route::delete('/author/{id}', [AuthController::class, 'destroy'])->middleware(['auth']);



require __DIR__ . '/auth.php';
