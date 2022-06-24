<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GameController;
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

Route::get('/cmd/{cmd}', function ($cmd) {
    return \Artisan::call("$cmd");
});

Route::get('/admin', [LoginController::class, 'index']);
Route::post('/admin/auth', [LoginController::class, 'login'])->name('admin-login');

Route::group(['middleware'=>'admin_auth'],function(){
    // Dashboard Route //////
    Route::get('admin/dashboard',[DashboardController::class,'index']);
    // Category Route //////
    Route::get('admin/category',[CategoryController::class,'index'])->name('admin-category');
    Route::get('admin/add/category',[CategoryController::class,'create'])->name('admin-add-category');
    //Resource for game
    Route::resource('admin/game', GameController::class);

    ////Logout Route///
    Route::get('/admin/logout', [LoginController::class,'logout'])->name('admin-logout');
});
Route::get('admin/secreat',[LoginController::class,'secreat']);