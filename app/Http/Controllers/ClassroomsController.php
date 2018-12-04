<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classrooms;
use App\Majors;


class ClassroomsController extends Controller
{
    public function index(){
        $Classrooms = Classrooms::all();
        return view('classrooms.home',['data'=>$Classrooms]);
    }

    public function add(){
        $Majors = Majors::all();
        return view('classrooms.add',['data'=>$Majors]);
    }
    
    public function store(Request $request){
        // dd($request->academic_years_id);

        Classrooms::create([
         'classroom_code' => $request->classroom_code,
         'classroom_name' => $request->classroom_name,
         'majors_id' => $request->majors_id
         ]);
         return redirect('/Classrooms');
    }
}
