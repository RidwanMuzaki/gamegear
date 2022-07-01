<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/index', function () {
    return view('index');
});

//Game - CRUD with Image
Route::get('dashboard', [GameController::class, 'index']);
Route::get('add-game', [GameController::class, 'create']);
Route::post('add-game', [GameController::class, 'store']);
Route::get('edit-game/{id}', [GameController::class, 'edit']);
Route::put('update-game/{id}', [GameController::class, 'update']);
Route::delete('delete-game/{id}', [GameController::class, 'destroy']);

//Export PDF
Route::get('/exportpdf', [GameController::class, 'exportpdf']);
Route::get('/downloadpdf', [GameController::class, 'downloadpdf']);


//Multi Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');