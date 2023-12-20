<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\AuthCOntroller;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\User\HomeController;
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

Route::get('login' , [AuthCOntroller::class, 'login']);
Route::get('logout' , [AuthCOntroller::class, 'logout']);
Route::get('register' , [AuthCOntroller::class, 'register']);
Route::post('loginUser' , [AuthCOntroller::class, 'loginAuth']);
Route::post('registerUser' , [AuthCOntroller::class, 'registerAuth']);

Route::middleware(['user_auth'])->prefix('user/')->group(function (){
    Route::get('home', [HomeController::class, 'index']);
    Route::get('view/helper', [HelperController::class, 'index']);
    Route::get('request/helper/{id}', [HelperController::class, 'requestView']);
    Route::post('add/helper', [HomeController::class, 'create']);
    Route::get('request/status', [HomeController::class, 'viewStatus']);
});


Route::middleware(['admin_auth'])->prefix('admin/')->group(function (){
    Route::get('home', [AdminHomeController::class, 'index']);
    Route::get('view/helper', [HelperController::class, 'index']);
    Route::get('view/user', [AdminHomeController::class, 'viewUser']);
    Route::get('add/helper', [HelperController::class, 'addView']);
    Route::get('edit/helper/{id}', [HelperController::class, 'editView']);
    Route::get('delete/helper/{id}', [HelperController::class, 'destroy']);
    Route::post('update/helper/{id}', [HelperController::class, 'update']);
    Route::post('create/helper', [HelperController::class, 'store']);
    Route::get('view/status', [AdminHomeController::class, 'viewStatus']);
    Route::get('accept/request/{id}', [AdminHomeController::class, 'accept']);
    Route::get('decline/request/{id}', [AdminHomeController::class, 'decline']);
});