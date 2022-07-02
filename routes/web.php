<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomizeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GameController;
use App\Models\Admin\Category;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\UserController;
use App\Models\Setting;

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

//Front page routes
Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('/cmd/{cmd}', function ($cmd) {
    \Artisan::call("$cmd");
    return \Artisan::output();
});

// Admin Routes
Route::get('/admin', [LoginController::class, 'index']);
Route::post('/admin/auth', [LoginController::class, 'login'])->name('admin-login');

Route::group(['middleware'=>'admin_auth'],function(){
    // Dashboard Route //////
    Route::get('admin/dashboard',[DashboardController::class,'index']);
    // Category Route //////
    Route::get('admin/category',[CategoryController::class,'index'])->name('admin-category');
    Route::get('admin/add/category',[CategoryController::class,'create'])->name('admin-add-category');
    //Resource for Category
    Route::resource('admin/category', CategoryController::class, ['as' => 'admin']);

    //Resource for game
    Route::resource('admin/game', GameController::class);


    // Customization
    Route::prefix('admin/customize')->name('admin.customize.')->group(function () {
        Route::get('homepage', [CustomizeController::class, 'editHomePage'])->name('homepage');
    });

    Route::resource('admin/slider', SliderController::class, ['as' => 'admin']);

    Route::prefix('admin/settings')->name('admin.settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::post('/logo', [SettingController::class, 'logo'])->name('set_logo');
    });

    ////Logout Route///
    Route::get('/admin/logout', [LoginController::class,'logout'])->name('admin-logout');
});
////Logout Route///
Route::get('/admin/logout', [LoginController::class,'logout'])->name('admin-logout');

////User Route////

Route::get('admin/secreat',[LoginController::class,'secreat']);
Route::post('user/register',[UserController::class,'register'])->name('user-register');
Route::post('user/login',[UserController::class,'login'])->name('user-login');
Route::get('/category/{id}', [FrontController::class, 'category'])->name('home.category');

Route::get('/language/{language}', [FrontController::class, 'language'])->name('home.language');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/play/{id}', [FrontController::class, 'play'])->name('home.play');
});
Route::get('/user/logout', [UserController::class,'logout'])->name('user-logout');