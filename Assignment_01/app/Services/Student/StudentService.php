<?php

namespace App\Services\Student;

use Illuminate\Http\Request;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;

/**
 * Service class for student.
 */
class StudentService implements StudentServiceInterface
{
    /**
     * student dao
     */
    private $studentdao;
    /**
     * Class Constructor
     * @param StudentDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $studentdao)
    {
        $this->studentdao = $studentdao;
    }
    /**
     * To get student list
     * @return array $studentList Student list
     */
    public function index()
    {
        return $this->studentdao->index();
    }

    public function createStudent(Request $request)
    {
        return $this->studentdao->createStudent($request);
    }

    public function editStudent($id)
    {
        return $this->studentdao->editStudent($id);
    }

    public function updateStudent($request, $id)
    {
        return $this->studentdao->updateStudent($request, $id);
    }

    public function deleteStudent($id)
    {
        return $this->studentdao->deleteStudent($id);
    }
}
