<?php

use App\Events\TestEvent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index']);

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'show']);
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::resource('/users', UserController::class);
Route::resource('/posts', PostController::class);

Route::group(['prefix' => 'chats', 'middleware' => 'auth'], function () {
    Route::get('/', [ChatsController::class, 'index']);
    Route::get('/messages', [ChatsController::class, 'fetchMessage']);
    Route::post('/messages', [ChatsController::class, 'sendMessage']);
});

Route::get('/broadcast', function () {
    broadcast(new TestEvent);
});
