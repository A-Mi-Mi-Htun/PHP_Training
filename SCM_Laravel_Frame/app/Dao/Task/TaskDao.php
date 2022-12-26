<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for task
 */
class TaskDao implements TaskDaoInterface
{

    /**
     * To show create task view
     * 
     * @return View tasks
     */
    public function index()
    {
        $tasks =  Task::all();
        return $tasks;
    }

    /**
     * To submit task create 
     * @param Request $request
     * @return View tasks 
     */
    public function savePost(Request $request)
    {
        $name = request()->name;
        Task::create([
            'name' => $name
        ]);
        return $name;
    }

    /**
     * To delete task by id
     * @return View tasks
     */
    public function deletePostById($id)
    {
        $msg = Task::where('id', $id)->delete();
        return $msg;
    }

    /**
     * Show tasks edit
     * 
     * @return View tasks
     */
    public function edit($id)
    {
        $task = Task::where('id', $id)->first();
        return $task;
    }

    /**
     * Submit task update
     * @param Request $request
     * @param $taskId
     * @return View tasks
     */
    public function updatePost($request, $id)
    {
        $name = $request->name;
        Task::where('id', $id)->update([
            'name' => $name
        ]);
        return $name;
    }
}
