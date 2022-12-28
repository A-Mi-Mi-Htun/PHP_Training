<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\ExportStudent;
use App\Imports\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * student interface 
     * */
    private $studentInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $students = $this->studentInterface->index();
        return view('students.index', compact('students'));
    }

    public function addStudent() 
    {
        return view('students.create');
    }

    public function createStudent(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|string|min:10',
            'email' => 'required',
            'address' => 'required'
        ]);

        $this->studentInterface->createStudent($request);
        return redirect('/')->with('info', 'Created Successfully');
    }

    public function editStudent($id)
    {
        //
        $student = $this->studentInterface->editStudent($id);
        return view('students.edit', compact('student'));
    }

    public function updateStudent(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|numeric|min:10',
            'email' => 'required',
            'address' => 'required'
        ]);

        $this->studentInterface->updateStudent($request, $id);
        return redirect('/')->with('info', 'Updated Successfully');
    }

    public function deleteStudent($id)
    {
        //
        $this->studentInterface->deleteStudent($id);
        return redirect('/')->with('info', 'Deleted Successfully');
    }

    function importExportStudent()
    {
        return view('importStudent');
    }
    

    public function importStudent()
    {
        request()->validate([
            'file' => 'required|max:500000|mimes:csv',
        ]);

        $this->studentInterface->importStudent();
        return redirect('/')->with('info', 'Data imported successfully');
    }

    public function exportStudent()
    {
        return $this->studentInterface->exportStudent();
    }
}

