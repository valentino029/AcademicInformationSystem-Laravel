<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class StudentsController extends Controller
{
    public function index(){
        $Students = Students::orderBy('student_nis','ASC')->get();
        return view('students.home',['data'=>$Students]);
    }

    public function indexNotAdmin(){
        $Students = Students::orderBy('student_nis','ASC')->get();
        return view('students.homenotadmin',['data'=>$Students]);
    }

    public function add(){
        $users = User::role('Student')->get();
        // dd($users->getRoleNames());
        return view('students.add',compact('users'));
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

    public function edit($id){
        $Students = Students::where('id', $id)->first();
        $users = User::role('Student')->get();
        
        return view('students.edit',compact('Students','users'));
   }

   public function update(Request $request){
    
    Students::where('id', $request->id)
    ->update([
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
