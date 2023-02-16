<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperationCategoryController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PageController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::resource('/operation-categories', OperationCategoryController::class)->names('operation-categories');
    Route::resource('/operations', OperationController::class)->except('show')->names('operations');

    Route::controller(PageController::class)->prefix('pages')->name('pages.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::patch('/{page}', 'update')->name('update');
        Route::get('/{page}/edit', 'edit')->name('edit');
        Route::get('/{page}/editor', [PageController::class, 'editor'])->name('editor');
    });
});

//Route::get('/{page}', [PageController::class, 'render']);
//Route::get('/', [PageController::class, 'render']);
//Route::get('/{any}', [PageController::class, 'render'])->where('any', '.*');
//Route::any( '(.*)', [PageController::class, 'render']);

Route::get('/{route?}', [PageController::class, 'render'])->where('route?', '.*');
