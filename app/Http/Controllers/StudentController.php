<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::query();

        if ($request->search) {
            $students = Student::searchStudent($request->search);
        }

        $students = $students->paginate(10);
        
        return view('main', compact('students'));
    }

    public function import(Request $request)
    {
        if (!$request->hasFile('file')) {
            return redirect()->to('/')->with([
                'alert-type' => 'alert-warning',
                'alert' => 'Please add file!'
            ]);
        }

        Excel::import(new StudentImport, $request->file('file'));
        
        return redirect()->to('/')->with([
            'alert-type' => 'alert-success',
            'alert' => 'Student successfully added!'
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->to('/')->with([
            'alert-type' => 'alert-success',
            'alert' => 'Student successfully removed!'
        ]);
    }
}
