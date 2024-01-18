<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CachetController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SportClassController;

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

Route::get('/form/{name}', [FormController::class, 'indexByName']);
Route::get('/form/byIndex/{index}', [FormController::class, 'indexByIndex']);
Route::post('/form/response', [AnswerController::class, 'store']);
Route::get('/dashboard/{form}/{timeStart}/{timeEnd}', [RequestController::class, 'indexDashboard']);
Route::get('/request/{id}', [RequestController::class, 'show']);
Route::put('/request/{request}', [RequestController::class, 'update']);
Route::get('/roles/names', [RoleController::class, 'names']);
Route::get('/roles/hours/{role}', [RoleController::class, 'hours']);
Route::get('/role/cash/{role}/{hour}', [RoleController::class, 'cash']);
Route::get('/workersAndRoles', [WorkerController::class, 'indexApi']);
Route::post('/updateCachet', [CachetController::class, 'updateCachet']);
Route::get('/clubex/sport/{id}', [SportController::class, 'edit']);
Route::get('/clubex/professors/{id}', [ProfessorController::class, 'edit']);
Route::get('/clubex/sportClass/sports/professors', [SportClassController::class, 'sportsAndProfessors']);
Route::get('/clubex/sport/getImage/{id}', [SportController::class, 'getImage']);
Route::get('/clubex/professor/getImage/{id}', [ProfessorController::class, 'getImage']);
Route::get('/clubex/sportClass/getSpecified', [SportClassController::class, 'getSpecified']);

