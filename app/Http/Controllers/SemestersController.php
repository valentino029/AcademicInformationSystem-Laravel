<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semesters;
use App\AcademicYears;

class SemestersController extends Controller
{
    public function index(){
        $Semesters = Semesters::all();
        return view('semesters.home',['data'=>$Semesters]);
    }

    public function add(){
        $AcademicYears = AcademicYears::all();
        return view('semesters.add',['data'=>$AcademicYears]);
    }

    public function store(Request $request){
        // dd($request->academic_years_id);

        Semesters::create([
         'semester_code' => $request->semester_code,
         'semester_name' => $request->semester_name,
         'academic_years_id' => $request->academic_years_id
         ]);
         return redirect('/Semesters');
    }
}
