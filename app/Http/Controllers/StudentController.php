<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function exportAllStudents()
    {
      return Excel::download(new StudentExport, 'student.xlsx');
    }
}
