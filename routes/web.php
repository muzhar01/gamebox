<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
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
});