<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicYears;

class AcademicYearsController extends Controller
{
    public function index(){
        $AcademicYears = AcademicYears::all();
        return view('academicyears.home',['data'=>$AcademicYears]);
    }

    public function show($id){
        $AcademicYears = AcademicYears::where('id', $id)->first();
        return view('academicyears.show',['data' => $AcademicYears]);
    }
}
