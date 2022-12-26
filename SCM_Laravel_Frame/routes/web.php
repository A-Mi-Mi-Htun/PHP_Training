<?php

//use App\Models\Task;
//use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, "index"]);
Route::post('/store', [TaskController::class, "store"]);
Route::delete('/tasks/delete/{id}', [TaskController::class, "delete"]);
Route::get('/tasks/edit/{id}', [TaskController::class, "edit"]);
Route::post('/tasks/update/{id}', [TaskController::class, "update"]);