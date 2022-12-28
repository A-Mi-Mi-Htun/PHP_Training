<?php

namespace App\Http\Controllers;
use App\Contracts\Services\Major\MajorServiceInterface;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Major interface 
     * */
    private $majorInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorInterface = $majorServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $majors = $this->majorInterface->index();
        return view('majors.create', compact('majors'));
    }

    public function addMajor() 
    {
        return view('majors.create');
    }

    public function createMajor(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $this->majorInterface->createMajor($request);
        return redirect('/majors')->with('info', 'Created Successfully');
    }

    public function editMajor($id)
    {
        //
        $major = $this->majorInterface->editMajor($id);
        return view('majors.edit', compact('major'));
    }

    public function updateMajor(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $this->majorInterface->updateMajor($request, $id);
        return redirect('/majors')->with('info', 'Updated Successfully');
    }

    public function deleteMajor($id)
    {
        //
        $this->majorInterface->deleteMajor($id);
        return redirect('/majors')->with('info', 'Deleted Successfully');
    }
}

