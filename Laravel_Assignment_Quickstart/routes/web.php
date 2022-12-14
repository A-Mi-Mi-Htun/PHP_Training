<?php

use App\Models\Task;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});

Route::get('/task/edit/{task}', function (Task $task) {
    return view('/edit', [
        'task' => $task
    ]);
});

Route::post('/task/edit/{task}', function (Request $request, Task $task) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

    //$task = Task::find($task);
    $task->update(['name' => $request->name]);
    $task->save();

    return redirect('/');
});

Route::controller('tasks', 'TaskController');