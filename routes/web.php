<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\CommentsController;


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
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);
Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::post('/posts', [PostsController::class, 'store']);

// Video
Route::get('/videos', [VideosController::class, 'index']);
Route::get('/videos/create', [VideosController::class, 'create']);
Route::get('/videos/{video}', [VideosController::class, 'show']);
Route::post('/videos', [VideosController::class, 'store']);

// Comments
Route::post('/{model}/{id}/comments', [CommentsController::class, 'store'])
    ->name('comments.store')
    ->where('model', 'post|video');




