<?php

use App\Http\Controllers\API\MajorController;
use App\Http\Controllers\API\StudentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('students', StudentController::class);

Route::apiResource('majors', MajorController::class);

Route::get('/students/pdf/{id}',[StudentController::class,'getPdf']);
Route::post('/students/email/{id}',[StudentController::class,'sendMail']);
