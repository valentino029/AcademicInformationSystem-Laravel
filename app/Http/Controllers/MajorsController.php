<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Majors;
use App\Grades;

class MajorsController extends Controller
{
    public function index(){
        $Majors = Majors::all();
        return view('majors.home',['data'=>$Majors]);
    }

    public function add(){
        $Grades = Grades::all();
        return view('majors.add',['data'=>$Grades]);
    }

    public function store(Request $request){
        // dd($request->academic_years_id);

        Majors::create([
         'major_code' => $request->major_code,
         'major_name' => $request->major_name,
         'grades_id' => $request->grades_id
         ]);
         return redirect('/Majors');
    }

    public function edit($id){
        $Majors = Majors::where('id', $id)->first();
        $Grades = Grades::all();
        // dd($Semesters);
        return view('majors.edit',compact('Majors','Grades'));
   }

   public function update(Request $request){
    Majors::where('id', $request->id)
    ->update([
        'major_code' => $request->major_code,
         'major_name' => $request->major_name,
         'grades_id' => $request->grades_id
    ]);
     return redirect('/Majors');
    }
}
