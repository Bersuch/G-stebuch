<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Controller\EditPostController;
use App\Controller\IndexController;
use App\Controller\DeletePostController;
use App\Controller\ProfilePage;
use App\Http\Controllers\CommentController;

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

Route::get('/', function () {
    return view('welcome');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile-settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-settings', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


//Route::get('/dashboard', [IndexController::class, 'indexAction'])->name('dashboard');
//Route::post('/dashboard', [IndexController::class, 'saveAction'])->name('saveEntry');


// View
Route::get('/gaestebuch', [IndexController::class, 'indexAction', ])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/showPost/{id}', [IndexController::class, 'showPostAction', CommentController::class, 'showComments' ])->middleware(['auth', 'verified'])->name('showPost');
Route::get('/profile/{id}', [ProfilePage::class, 'profileAction', ])->middleware(['auth', 'verified'])->name('profile');
Route::get('/profile', [ProfilePage::class, 'viewOwnProfile', ])->middleware(['auth', 'verified'])->name('OwnProfile');

// Edit
Route::get('/editPost/{id}', [EditPostController::class, 'editPostAction'])->middleware(['auth', 'verified'])->name('editPost');

// Save
Route::post('/storeComment', [CommentController::class, 'storeComment'])->middleware(['auth', 'verified'])->name('storeComment');
Route::post('/savePost{id}', [EditPostController::class, 'savePostAction'])->middleware(['auth', 'verified'])->name('savePost');
Route::post('/gaestebuch', [IndexController::class, 'saveAction'])->middleware(['auth', 'verified'])->name('saveEntry');

// Delete
Route::get('deletePost/{id}', [DeletePostController::class, 'deletePostAction'])->name('deletePost');

require __DIR__.'/auth.php';


/*
@include('posts.commentsDisplay', [
                            'comments' => $post->comments,
                            'post_id' => $post->id,
                        ])
*/
