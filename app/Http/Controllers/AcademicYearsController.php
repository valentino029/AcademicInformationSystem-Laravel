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

    public function add(){
        return view('academicyears.add');
    }

    public function show($id){
        $AcademicYears = AcademicYears::where('id', $id)->first();
        return view('academicyears.show',['data' => $AcademicYears]);
    }

    public function store(Request $request){

        AcademicYears::create([
         'year_code' => $request->year_code,
         'year_name' => $request->year_name
         ]);
         return redirect('/AcademicYears');
    }

    public function edit($id){
        $AcademicYears = AcademicYears::where('id', $id)->first();
        return view('academicyears.edit',['data' => $AcademicYears]);
   }

   public function update(Request $request){
    AcademicYears::where('id', $request->id)
    ->update([
        'year_code' => $request->year_code,
        'year_name' => $request->year_name
    ]);
     return redirect('/AcademicYears');
    }
}
