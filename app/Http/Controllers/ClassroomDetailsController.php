<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomDetails;
use App\Classrooms;
use App\Teachers;
use App\AcademicSubjects;


class ClassroomDetailsController extends Controller
{
    public function index(){
        $ClassroomDetails = ClassroomDetails::all();
        return view('classroomdetails.home',['data'=>$ClassroomDetails]);
    }

    public function add(){
        $Classrooms = Classrooms::all();
        $Teachers = Teachers::all();
        $AcademicSubjects = AcademicSubjects::all();
        return view('classroomdetails.add',compact('Classrooms','Teachers','AcademicSubjects'));
    }

    public function store(Request $request){
        // dd($request->academic_years_id);

        ClassroomDetails::create([
         'classrooms_id' => $request->classrooms_id,
         'academic_subjects_id' => $request->academic_subjects_id,
         'teachers_id' => $request->teachers_id
         ]);
         return redirect('/ClassroomDetails');
    }
   
}
