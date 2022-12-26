<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskDaoInterface
{

    /**
     * To show task view
     * 
     * @return View tasks
     */
    public function index();

    /**
     * To submit task create 
     * @param Request $request
     * @return View tasks 
     */
    public function savePost(Request $request);

    /**
     * To delete task by id
     * @return View tasks
     */
    public function deletePostById($id);

    /**
     * Show tasks edit
     * 
     * @return View tasks
     */
    public function edit($id);

    /**
     * Submit task update
     * @param Request $request
     * @param $taskId
     * @return View tasks
     */
    public function updatePost($request, $id);
}
