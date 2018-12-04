<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grades;
use App\Semesters;

class GradesController extends Controller
{
    public function index(){
        $Grades = Grades::all();
        return view('grades.home',['data'=>$Grades]);
    }

    public function add(){
        $Semesters = Semesters::all();
        return view('grades.add',['data'=>$Semesters]);
    }

    public function store(Request $request){
        // dd($request->academic_years_id);

        Grades::create([
         'grade_code' => $request->grade_code,
         'grade_name' => $request->grade_name,
         'semesters_id' => $request->semesters_id
         ]);
         return redirect('/Grades');
    }
}
