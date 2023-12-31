<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RequestController;

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
