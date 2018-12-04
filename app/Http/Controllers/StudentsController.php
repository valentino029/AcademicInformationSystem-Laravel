<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\User;

class StudentsController extends Controller
{
    public function index(){
        $Students = Students::all();
        return view('students.home',['data'=>$Students]);
    }

    public function add(){
        $users = User::where('level','=',3)->get();
        return view('students.add',['data'=>$users]);
    }

    public function store(Request $request){

        Students::create([
         'student_nis' => $request->student_nis,
         'student_nisn' => $request->student_nisn,
         'student_name' => $request->student_name,
         'student_major' => $request->student_major,
         'student_gender' => $request->student_gender,
         'users_id' => $request->users_id
         ]);
         return redirect('/StudentData');
    }
}
