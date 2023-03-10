<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntitiesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TurnsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::post('/register/', [AuthController::class, 'register']);
Route::post('/login/', [AuthController::class, 'login']);
Route::post('/refresh/', [AuthController::class, 'refresh']);

//home
Route::get('/home/', [HomeController::class, 'index']);
Route::get('/home/entity/{entity}', [HomeController::class, 'all']);

//entitys
Route::get('/entities/', [EntitiesController::class, 'index']);
Route::get('/entities/{id}/', [EntitiesController::class, 'watch']);
Route::post('/entities/', [EntitiesController::class, 'register']);
Route::post('/entities/update/{id}/', [EntitiesController::class, 'update']);
Route::post('/entities/delete/{id}/', [EntitiesController::class, 'delete']);

//documents
Route::get('/services/', [ServicesController::class, 'index']);
Route::get('/services/entity/{entity}', [ServicesController::class, 'all']);
Route::get('/services/{identification}/', [ServicesController::class, 'watch']);
Route::post('/services/', [ServicesController::class, 'register']);
Route::post('/services/update/{id}/', [ServicesController::class, 'update']);
Route::post('/services/delete/{id}/', [ServicesController::class, 'delete']);

//turns
Route::get('/turns/', [TurnsController::class, 'index']);
Route::get('/turns/{id}/', [TurnsController::class, 'watch']);
Route::post('/turns/', [TurnsController::class, 'register']);
Route::post('/turns/update/{id}/', [TurnsController::class, 'update']);
Route::post('/turns/delete/{id}/', [TurnsController::class, 'delete']);

//users
Route::get('/profile', [UserController::class, 'userProfile']);
Route::post('/users', [UserController::class, 'register']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/update/{id}/', [UserController::class, 'update']);
Route::post('/users/delete/{id}/', [UserController::class, 'delete']);