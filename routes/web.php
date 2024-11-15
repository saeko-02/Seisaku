<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('id.destroy');
// 検索画面
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'search'])->name('items.search');
        // 検索画面でのクリアボタン処理
        Route::get('/searchReset', [App\Http\Controllers\ItemController::class, 'searchReset'])->name('items.searchReset');
});

