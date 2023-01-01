<?php

namespace App\Services\Student;

use Illuminate\Http\Request;
use App\Exports\ExportStudent;
use App\Imports\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;
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

    public function importStudent()
    {
        $data = Excel::import(new ImportStudent, request()->file('customFile')->store('files'));
        return $data;
    }

    public function exportStudent()
    {
        return Excel::download(new ExportStudent(), 'students.csv');
    }

    public function search($request) 
    {
        return $this->studentdao->search($request);

    }

}
