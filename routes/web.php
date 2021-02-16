<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\VideoCommentsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Post
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);

// Video
Route::get('/videos', [VideoController::class, 'index']);
Route::get('/videos/create', [VideoController::class, 'create']);
Route::get('/videos/{video}', [VideoController::class, 'show']);
Route::post('/videos', [VideoController::class, 'store']);

// Post Comments
Route::post('/posts/{post}/comment', [PostController::class, 'storeComment']);

// Video Comments
Route::post('/videos/{video}/comment', [VideoController::class, 'storeComment']);



