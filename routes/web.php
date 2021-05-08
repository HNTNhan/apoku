<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetLikesController;
use App\Http\Controllers\TweetsController;
use App\Models\Tweet;
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

Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])
    ->name('profiles')
    ->middleware(['auth']);
Route::patch('/profiles/{user:username}', [ProfilesController::class, 'update'])
    ->middleware('can:edit,user');
Route::patch('/profiles/{user:username}/banner', [ProfilesController::class, 'update_banner'])
    ->middleware('can:edit,user');
Route::get('/profiles/{user:username}/edit', [ProfilesController::class, 'edit'])
    ->middleware(['auth', 'can:edit,user'])
    ->name('edit');

Route::post('/profiles/{user:username}/follow', [FollowController::class, 'store'])
    ->middleware(['auth'])
    ->name('follow');


Route::get('/tweets', [TweetsController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');
Route::post('/tweets', [TweetsController::class, 'store'])
    ->middleware(['auth']);
Route::delete('/tweets/{tweet}', [TweetsController::class, 'destroy'])
    ->middleware(['auth', 'can:edit,user']);
Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'store'])
    ->middleware(['auth']);
Route::delete('/tweets/{tweet}/like', [TweetLikesController::class, 'destroy'])
    ->middleware(['auth']);

Route::get('/explore', [ExploreController::class, 'index'])
    ->middleware(['auth'])
    ->name('explore');

require __DIR__.'/auth.php';
