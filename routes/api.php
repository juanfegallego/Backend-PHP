<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);


Route::middleware('auth:api')->group(function(){

    Route::resource('comment', CommentController::class);

    //User
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('users/all', [UserController::class, 'all']);
    Route::resource('users', UserController::class);

    //CRUD of Game
    Route::post('game', [GameController::class, 'store']);
    Route::put('game', [GameController::class, 'update']);
    Route::get('game/{id}', [GameController::class, 'show']);
    Route::delete('game', [GameController::class, 'destroy']);


    //Party
    Route::resource('parties', PartyController::class);
    Route::get('parties/name/{name}', [PartyController::class, 'byname']);
});
