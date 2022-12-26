<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

/**
 * 
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
    /**
     * task dao
     */
    private $taskDao;

    /**
     * Class Constructor
     * @param taskDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * To show create task view
     * 
     * @return View tasks
     */
    public function index()
    {
        return $this->taskDao->index();
    }

    /**
     * To submit task create 
     * @param Request $request
     * @return View tasks 
     */
    public function savePost(Request $request)
    {
        return $this->taskDao->savePost($request);
    }

    /**
     * To delete task by id
     * @return View tasks
     */
    public function deletePostById($id)
    {
        return $this->taskDao->deletePostById($id);
    }

    /**
     * Show tasks edit
     * 
     * @return View tasks
     */
    public function edit($id)
    {
        return $this->taskDao->edit($id);
    }

    /**
     * Submit task update
     * @param Request $request
     * @param $taskId
     * @return View tasks
     */
    public function updatePost($request, $id)
    {
        return $this->taskDao->updatePost($request, $id);
    }
}
