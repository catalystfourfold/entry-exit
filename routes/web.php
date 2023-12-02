<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;

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
    return view('welcome');
});

Route::get('/qrcode', function () {
    return response()->file(storage_path('app/public/qrcodes/qrcode.png'));
});

Route::get('/generate-initial-qrcode', [QrCodeController::class, 'generateInitialQrCode']);

Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('/employee/enter', [App\Http\Controllers\EmployeeController::class, 'enter']);
Route::get('/employee/exit', [App\Http\Controllers\EmployeeController::class, 'exit']);
Route::get('/employee/success', [App\Http\Controllers\EmployeeController::class, 'success']);
Route::get('/employee/error', [App\Http\Controllers\EmployeeController::class, 'error']);

Route::get('/visitor', [App\Http\Controllers\VisitorController::class, 'index']);
Route::get('/visitor/enter', [App\Http\Controllers\VisitorController::class, 'enter']);
Route::get('/visitor/exit', [App\Http\Controllers\VisitorController::class, 'exit']);
Route::get('/visitor/success', [App\Http\Controllers\VisitorController::class, 'success']);
Route::get('/visitor/error', [App\Http\Controllers\VisitorController::class, 'error']);

Route::get('/list', [App\Http\Controllers\ListController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
