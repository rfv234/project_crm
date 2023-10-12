<?php

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
/**
 * crm
 */
Route::get('/homepage', [\App\Http\Controllers\HomepageController::class, 'homepage'])->middleware('auth');
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'news'])->middleware('auth');
Route::get('/create_news', [\App\Http\Controllers\NewsController::class, 'create'])->middleware('auth');
Route::get('/save_news', [\App\Http\Controllers\NewsController::class, 'save'])->middleware('auth');
Route::get('/delete', [\App\Http\Controllers\NewsController::class, 'delete'])->middleware('auth');
Route::get('/your_error', [\App\Http\Controllers\NewsController::class, 'showError'])->middleware('auth');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/check_user', [\App\Http\Controllers\LoginController::class, 'checkUser']);
Route::get('/dislogin', [\App\Http\Controllers\LoginController::class, 'dislogin']);
Route::get('/users_list', [\App\Http\Controllers\NewsController::class, 'users_list']);
Route::get('/change_permission/{user_id}/{rule_id}', [\App\Http\Controllers\NewsController::class, 'change_permission']);
