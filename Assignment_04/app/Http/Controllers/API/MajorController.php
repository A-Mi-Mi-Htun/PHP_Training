<?php

namespace App\Http\Controllers\API;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::all();
        return response()->json($majors, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;

        $majors = Major::create([
            'name' => $name,
        ]);
        return response()->json(['createMajor' => $majors, 'msg' => 'Data Created successfully'], 200);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $majors = Major::find($id);
        return response()->json($majors, 200);
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

        $majors = Major::findOrFail($id);
        $majors->update([
            'name' => $name,
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
        $majors = Major::findOrFail($id);
        $majors->delete();
        return response()->json(['deleteMajor' => $majors, 'msg' => 'Data Deleted Successfully'], 200);
    }
}
