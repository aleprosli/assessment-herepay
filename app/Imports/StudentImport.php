<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Student::firstOrCreate([
            'name' => $row[0]
        ], [
            'class' => $row[1],
            'level' => $row[2],
            'parent_contact' => $row[3],
        ]);
    }
}
