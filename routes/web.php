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

Route::get('/', [IndexController::class, 'indexAction'])->name('index');
Route::post('/', [IndexController::class, 'saveAction'])->name('saveEntry');

// Edit
Route::get('/editPost/{id}', [EditPostController::class, 'editPostAction'])->name('editPost');
Route::post('/savePost/{id}', [EditPostController::class, 'savePostAction'])->name('savePost');

// Delete
Route::get('deletePost/{id}', [DeletePostController::class, 'deletePostAction'])->name('deletePost');