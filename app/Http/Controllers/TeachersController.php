<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;
use App\User;

class TeachersController extends Controller
{
    public function index(){
        $Teachers = Teachers::orderBy('teacher_identy_number','ASC')->get();
        return view('teachers.home',['data'=>$Teachers]);
    }

    public function indexNotAdmin(){
        $Teachers = Teachers::orderBy('teacher_identy_number','ASC')->get();
        return view('teachers.homeNotAdmin',['data'=>$Teachers]);
    }

    public function add(){
        $users = User::role('Teacher')->get();
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

    public function edit($id){
        $Teachers = Teachers::where('id', $id)->first();
        $users = User::role('Teacher')->get();
        
        return view('teachers.edit',compact('Teachers','users'));
   }

   public function update(Request $request){
    
    Teachers::where('id', $request->id)
    ->update([
        'teacher_identy_number' => $request->teacher_identy_number,
         'teacher_nip' => $request->teacher_nip,
         'teacher_name' => $request->teacher_name,
         'users_id' => $request->users_id
    ]);
     return redirect('/TeacherData');
    }
}
