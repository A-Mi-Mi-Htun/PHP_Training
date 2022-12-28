<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

/**
 * Interface for student service
 */
interface StudentDaoInterface
{

    /**
     * To show create student view
     * 
     * @return View students
     */
    public function index();

    /**
     * To submit student create 
     * @param Request $request
     * @return View students 
     */
    public function createStudent(Request $request);

    /**
     * To delete student by id
     * @return View students
     */
    public function deleteStudent($id);

    /**
     * Show students edit
     * 
     * @return View students
     */
    public function editStudent($id);

    /**
     * Submit student update
     * @param Request $request
     * @param $studentId
     * @return View students
     */
    public function updateStudent($request, $id);
}
