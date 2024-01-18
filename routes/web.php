<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CachetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClubeXController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SportClassController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::post('/sports/{id}', [SportController::class, 'update'])->name('sports.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('forms', FormController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('options', OptionController::class);
    Route::resource('requests', RequestController::class)->except(['update']);
    Route::resource('answers', AnswerController::class);
    Route::resource('workers', WorkerController::class);
    Route::resource('events', EventController::class);
    Route::resource('cachets', CachetController::class);

    Route::resource('sports', SportController::class);

    Route::resource('professors', ProfessorController::class);

    Route::post('/sportsClass/update', [SportClassController::class, 'update'])->name('sportsClass.update');
    Route::delete('/sportsClass/delete/{sport_id}/{professor_id}/{day}/{hour}', [SportClassController::class, 'destroy'])->name('sportsClass.destroy');
    Route::resource('sportsClass', SportClassController::class)->except(['update', 'destroy']);

    Route::resource('roles', RoleController::class)->except(['update']);
    Route::get('forms/{form}/dashboard', [FormController::class, 'dashboard'])->name('forms.dashboard');
    
    Route::post('/role/updateCash', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/clubex', [ClubeXController::class, 'index'])->name('clubex.index');
    
    Route::get('/answers/indexByForm/{id}', [AnswerController::class, 'indexByForm'])->name('answers.indexByForm');

});

require __DIR__.'/auth.php';
