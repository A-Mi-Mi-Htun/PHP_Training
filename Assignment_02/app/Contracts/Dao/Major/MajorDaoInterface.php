<?php

namespace App\Contracts\Dao\Major;

use Illuminate\Http\Request;

/**
 * Interface for Major service
 */
interface MajorDaoInterface
{

    /**
     * To show create Major view
     * 
     * @return View Majors
     */
    public function index();

    /**
     * To submit Major create 
     * @param Request $request
     * @return View Majors 
     */
    public function createMajor(Request $request);

    /**
     * To delete Major by id
     * @return View Majors
     */
    public function deleteMajor($id);

    /**
     * Show Majors edit
     * 
     * @return View Majors
     */
    public function editMajor($id);

    /**
     * Submit Major update
     * @param Request $request
     * @param $MajorId
     * @return View Majors
     */
    public function updateMajor($request, $id);
}
