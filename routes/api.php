<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['json.response'])->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
});

Route::group(['middleware' => ['auth:sanctum', 'json.response']], function () {
    Route::get('authenticated', [UserController::class, 'authenticated']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('departments', [DepartmentController::class, 'index']);
    Route::get('departments/list', [DepartmentController::class, 'list']);
    Route::post('departments', [DepartmentController::class, 'store']);
    Route::post('departments/{id}', [DepartmentController::class, 'update']);
    Route::get('departments/{id}', [DepartmentController::class, 'show']);

    Route::get('projects', [ProjectController::class, 'index']);
    Route::post('projects', [ProjectController::class, 'store']);
    Route::post('projects/{id}', [ProjectController::class, 'update']);
    Route::get('projects/{id}', [ProjectController::class, 'show']);

    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('employees/list', [EmployeeController::class, 'list']);
    Route::post('employees', [EmployeeController::class, 'store']);
    Route::post('employees/{id}', [EmployeeController::class, 'update']);
    Route::get('employees/{id}', [EmployeeController::class, 'show']);


});
