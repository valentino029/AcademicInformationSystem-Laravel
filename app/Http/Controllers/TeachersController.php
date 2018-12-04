<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;
use App\User;

class TeachersController extends Controller
{
    public function index(){
        $Teachers = Teachers::all();
        return view('teachers.home',['data'=>$Teachers]);
    }

    public function add(){
        $users = User::where('level','=',2)->get();
        return view('teachers.add',['data'=>$users]);
    }

    public function store(Request $request){

        Teachers::create([
         'teacher_identy_number' => $request->teacher_identy_number,
         'teacher_nip' => $request->teacher_nip,
         'teacher_name' => $request->teacher_name,
         'users_id' => $request->users_id
         ]);
         return redirect('/TeacherData');
    }
}
