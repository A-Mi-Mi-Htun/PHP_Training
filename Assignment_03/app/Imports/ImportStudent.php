<?php

namespace App\Imports;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStudent implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Student::create([
            'name' => $row[0],
            'phone' => $row[1],
            'email' => $row[2],
            'address' => $row[3],
            'major_id' => $row[4],
        ]);

    }
}
