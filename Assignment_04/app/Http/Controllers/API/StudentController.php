<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages =  ['required' => "The :attribute field is required"];

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'phone' => 'required|max:11',
            'email' => 'required',
            'address' => 'required',
            'major' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);    
        } else {
            $name = $request->name;
            $phone = $request->phone;
            $email = $request->email;
            $address = $request->address;
            $major_id = $request->major;
    
            $students = Student::create([
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'address' => $address,
                'major_id' => $major_id
            ]);
            return response()->json(['createStudent' => $students, 'msg' => 'Data Created successfully'], 200);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::find($id);
        return response()->json($students, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $major_id = $request->major;

        $students = Student::findOrFail($id);
        $students->update([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'major_id' => $major_id
        ]);
        return response()->json(['msg' => 'Data Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        return response()->json(['deleteStudent' => $students, 'msg' => 'Data Deleted Successfully'], 200);
    }
}
