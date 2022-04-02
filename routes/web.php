<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;

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
Route::prefix('/admin')->group(function(){
Route::match(['get', 'post'], '/login',[App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogin'])->name('adminLogin');
        
Route::group(['middleware'=> ['admin']] ,function () {
Route::get('/dashboard', [App\Http\Controllers\Admin\AdminLoginController::class, 'dashboard'])->name('adminDashboard');     
 });
});