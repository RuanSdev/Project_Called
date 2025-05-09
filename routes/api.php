<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalledController;
use App\Http\Controllers\CallResponseController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return ["msg" => "API Sucess"];
});
Route::prefix('api/v1')->group(function(){


Route::post('login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('users')->group(function(){

        Route::post('/',[UserController::class, 'store'])->middleware('ability:user-store');
        Route::get('/all',[UserController::class, 'index'])->middleware('ability:user-index');
        Route::get('{uuid}',[UserController::class, 'show'])->middleware('ability:user-show');
        Route::patch('{uuid}',[UserController::class, 'update'])->middleware('ability:user-update');
        Route::put('{uuid}',[UserController::class, 'destroy'])->middleware('ability:user-destroy');
        Route::get('restore/{uuid}',[UserController::class, 'restore'])->middleware('ability:user-restore');
});
    Route::prefix('calleds')->group(function(){
        Route::post('/',[CalledController::class, 'store'])->middleware('ability:called-store');
        Route::get('/',[CalledController::class, 'index'])->Middleware('ability:called-index');
        Route::post('response',[CallResponseController::class,'store'])->middleware('ability:callResponse-store');
        Route::get('response/{called_uuid}',[CallResponseController::class,'show'])->middleware('ability:callResponse-show');
        Route::patch('assigned/{uuid}',[CalledController::class, 'update'])->middleware('ability:called-update');

    });

    Route::prefix('establishments')->group(function(){

        Route::post('/',[EstablishmentController::class, 'store'])->Middleware('ability:establishment-store');
        Route::get('/all',[EstablishmentController::class, 'index'])->Middleware('ability:establishment-index');
        Route::get('{uuid}',[EstablishmentController::class, 'show'])->Middleware('ability:establishment-show');
    });
    Route::post('logout',[AuthController::class, 'logout']);

});

});





