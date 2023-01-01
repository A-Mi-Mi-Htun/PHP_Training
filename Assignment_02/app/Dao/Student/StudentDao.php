<?php

namespace App\Dao\Student;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Student\StudentDaoInterface;

/**
 * Data accessing object for student
 */
class StudentDao implements StudentDaoInterface
{

    /**
     * To show create student view
     * 
     * @return View students
     */
    public function index()
    {
        $students = Student::get();
        return $students;        
    }

    /**
     * To submit student create 
     * @param Request $request
     * @return View students 
     */
    public function createStudent(Request $request)
    {
        $name = request()->name;
        $phone = request()->phone;
        $email = request()->email;
        $address = request()->address;
        $major_id = request()->major;
        Student::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'major_id' => $major_id
        ]);
        return $name;
    }

    /**
     * To delete student by id
     * @return View students
     */
    public function deleteStudent($id)
    {
        $msg = Student::where('id', $id)->delete();
        return $msg;
    }

    /**
     * Show students edit
     * 
     * @return View students
     */
    public function editStudent($id)
    {
        $student = Student::where('id', $id)->first();
        return $student;
    }

    /**
     * Submit student update
     * @param Request $request
     * @param $studentId
     * @return View students
     */
    public function updateStudent($request, $id)
    {
        $name = request()->name;
        $phone = request()->phone;
        $email = request()->email;
        $address = request()->address;
        $major_id = request()->major;
        Student::where('id', $id)->update([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'major_id' => $major_id
        ]);
        return $name;
    }

    public function importStudent()
    {
        return $this->studentdao->importStudent();
    }

    public function exportStudent()
    {
        return $this->studentdao->exportStudent();
    }
}
