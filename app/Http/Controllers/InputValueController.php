<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InputValueController extends Controller
{
    public function InputValue(){
        return view('studyresult.inputvalue.home');
    }

    public function myform()
    {
    	$AcademicYears = DB::table('academic_years')->pluck("year_name","id")->all();
    	return view('studyresult.inputvalue.home',compact('academic_years'));
    }


    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAjax(Request $request)
    {
    	if($request->ajax()){
    		$Semesters = DB::table('Semesters')->where('academic_years_id',$request->academic_years_id)->pluck("semester_name","id")->all();
    		$data = view('ajax-select',compact('Semesters'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }
}
