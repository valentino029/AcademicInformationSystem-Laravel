<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicSubjects;
use App\Majors;

class AcademicSubjectsController extends Controller
{
    public function index(){
        $AcademicSubjects = AcademicSubjects::all();
        return view('academicsubjects.home',['data'=>$AcademicSubjects]);
    }

    public function add(){
        $Majors = Majors::all();
        // dd($Majors);
        return view('academicsubjects.add',['data'=>$Majors]);
    }

    public function store(Request $request){
        

        AcademicSubjects::create([
         'academic_subjects_code' => $request->academic_subjects_code,
         'academic_subjects_name' => $request->academic_subjects_name,
         'majors_id' => $request->majors_id
         ]);
         return redirect('/AcademicSubjects');
    }
}
