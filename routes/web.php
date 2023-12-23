<?php

use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [TransactionController::class, 'index'])->name('index');

Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('transaction/show', [TransactionController::class, 'show'])->name('transaction.show');
Route::get('transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::get('transaction/{id}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
Route::put('transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update');
Route::delete('transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
