<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Controller\EditPostController;
use App\Controller\IndexController;
use App\Controller\DeletePostController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', [IndexController::class, 'indexAction', ])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [IndexController::class, 'saveAction'])->middleware(['auth', 'verified'])->name('saveEntry');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


//Route::get('/dashboard', [IndexController::class, 'indexAction'])->name('index');
//Route::post('/dashboard', [IndexController::class, 'saveAction'])->name('saveEntry');


// Edit
Route::get('/editPost/{id}', [EditPostController::class, 'editPostAction'])->name('editPost');
Route::post('/savePost/{$id}', [EditPostController::class, 'savePostAction'])->name('savePost');

// Delete
Route::get('deletePost/{id}', [DeletePostController::class, 'deletePostAction'])->name('deletePost');

require __DIR__.'/auth.php';
