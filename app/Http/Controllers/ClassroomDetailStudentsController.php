<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomDetailStudents;
use App\Classrooms;
use App\ClassroomDetails;
use App\Students;

class ClassroomDetailStudentsController extends Controller
{
    public function index(){
        $ClassroomDetailStudents = ClassroomDetailStudents::all();
        return view('classroomdetailstudent.home',['data'=>$ClassroomDetailStudents]);
    }

    public function add($id){
        $ClassroomDetails = ClassroomDetails::where('id','=',$id)->first();
        // dd($ClassroomDetails->id);
        $Students = Students::all();
        return view('classroomdetailstudent.add',compact('ClassroomDetails','Students'));
    }

    public function show($id){
        $ClassroomDetailStudents = ClassroomDetailStudents::where('classrooms_details_id','=',$id)->get();
        // dd($ClassroomDetailStudents);
        return view('classroomdetailstudent.show',compact('ClassroomDetailStudents'));
    }

    public function store(Request $request){
        // dd($request->classrooms_details_id,$request->students_id);

        ClassroomDetailStudents::create([
         'classrooms_details_id' => $request->classrooms_details_id,
         'students_id' => $request->students_id
         ]);
         return redirect('/ClassroomDetails');
    }

    public function destroy(Request $request)
    {
        $cds = ClassroomDetailStudents::findOrFail($request->id);
        $cds->delete();
        return redirect()->back()->with(['success' => 'User: <strong>' . $cds->student_id . '</strong> Dihapus']);
    }
}
