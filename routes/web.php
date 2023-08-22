<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Api\NotController;

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

Route::get('/',[HomeController::class ,'index']);
Route::get('/login',[AdminController::class ,'login_page'])->name('login');
Route::post('/login',[AdminController::class ,'login'])->name('login.post');
Route::get('/logout',[AdminController::class ,'logout'])->name('logout');

Route::prefix('admin')->group(function(){
    Route::group(['middleware'=>['admin']],function(){
        Route::get('/controle',[AdminController::class ,'chackrole'])->name('control');
        Route::get('/all-user',[AdminController::class , 'allUser'])->name('all.user');
        Route::get('/all-note',[NotController::class , 'index'])->name('all.note');
        Route::post('/note/create',[NotController::class ,'store'])->name('store.note');
        Route::get('/note-edit/{note}',[NotController::class , 'edite'])->name('edit.note');
        Route::put('/update/{note}',[NotController::class ,'update'])->name('update.note');
        Route::get('/delete/{note}',[NotController::class ,'destory'])->name('destory.note');

    });
});
