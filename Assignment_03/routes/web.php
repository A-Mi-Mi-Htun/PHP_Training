<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;
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

Route::get('/', [StudentController::class, "index"]);
Route::get('/create', [StudentController::class, "addStudent"]);
Route::post('/create', [StudentController::class, "createStudent"]);
Route::get('/edit/{id}', [StudentController::class, "editStudent"]);
Route::post('/update/{id}', [StudentController::class, "updateStudent"]);
Route::delete('/delete/{id}', [StudentController::class, "deleteStudent"]);

Route::get('/majors', [MajorController::class, "index"]);
Route::get('/majors/create', [MajorController::class, "addMajor"]);
Route::post('/majors/create', [MajorController::class, "createMajor"]);
Route::get('/majors/edit/{id}', [MajorController::class, "editMajor"]);
Route::post('/majors/update/{id}', [MajorController::class, "updateMajor"]);
Route::delete('/majors/delete/{id}', [MajorController::class, "deleteMajor"]);

Route::get('/import', [StudentController::class, "importExportStudent"]);
Route::post('/import', [StudentController::class, "importStudent"]);
Route::get('/export', [StudentController::class, "exportStudent"]);
Route::post('/search', [StudentController::class, "search"]);