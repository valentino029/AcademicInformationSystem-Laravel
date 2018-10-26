<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grades;

class GradesController extends Controller
{
    public function index(){
        $Grades = Grades::all();
        return view('grades.home',['data'=>$Grades]);
    }
}
