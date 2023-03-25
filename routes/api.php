<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntitiesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TurnsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientsController;
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

Route::post('/register/', [AuthController::class, 'register'])->middleware('cors');;
Route::post('/login/', [AuthController::class, 'login'])->middleware('cors');
Route::post('/refresh/', [AuthController::class, 'refresh'])->middleware('cors');

//home
Route::get('/home/', [HomeController::class, 'index'])->middleware('cors');
Route::get('/home/entity/{entity}', [HomeController::class, 'all'])->middleware('cors');

//entitys
Route::get('/entities/', [EntitiesController::class, 'index'])->middleware('cors');
Route::get('/entities/{id}/', [EntitiesController::class, 'watch'])->middleware('cors');
Route::post('/entities/', [EntitiesController::class, 'register'])->middleware('cors');
Route::post('/entities/update/{id}/', [EntitiesController::class, 'update'])->middleware('cors');
Route::post('/entities/delete/{id}/', [EntitiesController::class, 'delete'])->middleware('cors');

//documents
Route::get('/services/', [ServicesController::class, 'index'])->middleware('cors');
Route::get('/services/entity/{entity}', [ServicesController::class, 'all'])->middleware('cors');
Route::get('/services/{identification}/', [ServicesController::class, 'watch'])->middleware('cors');
Route::post('/services/', [ServicesController::class, 'register'])->middleware('cors');
Route::post('/services/update/{id}/', [ServicesController::class, 'update'])->middleware('cors');
Route::post('/services/delete/{id}/', [ServicesController::class, 'delete'])->middleware('cors');

//turns
Route::get('/turns/', [TurnsController::class, 'index'])->middleware('cors');
Route::get('/turns/{id}/', [TurnsController::class, 'watch'])->middleware('cors');
Route::post('/turns/', [TurnsController::class, 'register'])->middleware('cors');
Route::post('/turns/update/{id}/', [TurnsController::class, 'update'])->middleware('cors');
Route::post('/turns/delete/{id}/', [TurnsController::class, 'delete'])->middleware('cors');

//users
Route::get('/profile', [UserController::class, 'userProfile'])->middleware('cors');
Route::post('/users', [UserController::class, 'register'])->middleware('cors');
Route::get('/users', [UserController::class, 'index'])->middleware('cors');
Route::post('/users/update/{id}/', [UserController::class, 'update'])->middleware('cors');
Route::post('/users/delete/{id}/', [UserController::class, 'delete'])->middleware('cors');
Route::post('/users/reset_password/{id}/', [UserController::class, 'reset_password'])->middleware('cors');

//patients
Route::post('/patients', [PatientsController::class, 'register'])->middleware('cors');
Route::get('/patients', [PatientsController::class, 'index'])->middleware('cors');
Route::post('/patients/update/{id}/', [PatientsController::class, 'update'])->middleware('cors');
Route::post('/patients/delete/{id}/', [PatientsController::class, 'delete'])->middleware('cors');