<?php

namespace App\Dao\Major;

use App\Models\Major;
use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for Major
 */
class MajorDao implements MajorDaoInterface
{

    /**
     * To show create Major view
     * 
     * @return View Majors
     */
    public function index()
    {
        $majors = Major::all();
        return $majors;
    }

    /**
     * To submit Major create 
     * @param Request $request
     * @return View Majors 
     */
    public function createMajor(Request $request)
    {
        $name = request()->name;
        Major::create([
            'name' => $name,
        ]);
        return $name;
    }

    /**
     * To delete Major by id
     * @return View Majors
     */
    public function deleteMajor($id)
    {
        $msg = Major::where('id', $id)->delete();
        return $msg;
    }

    /**
     * Show Majors edit
     * 
     * @return View Majors
     */
    public function editMajor($id)
    {
        $msg = Major::where('id', $id)->first();
        return $msg;
    }

    /**
     * Submit Major update
     * @param Request $request
     * @param $MajorId
     * @return View Majors
     */
    public function updateMajor($request, $id)
    {
        $name = request()->name;
        Major::where('id', $id)->update([
            'name' => $name,
        ]);
        return $name;
    }
}
