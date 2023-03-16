<?php

use App\Controller\EditPostController;
use App\Controller\IndexController;
use App\Controller\DeletePostController;
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

Route::match(['GET', 'POST'],'/', [IndexController::class, 'indexAction'])->name('index');
Route::get('editPost', [EditPostController::class, 'editPostAction'])->name('editPost');
Route::get('deletePost', [DeletePostController::class, 'deletePostAction'])->name('deletePost');