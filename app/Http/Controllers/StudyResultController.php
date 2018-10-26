<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyResultController extends Controller
{
    public function InputValue(){
        return view('studyresult.inputvalue.home');
    }
}
