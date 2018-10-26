<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semesters;

class SemestersController extends Controller
{
    public function index(){
        $Semesters = Semesters::all();
        return view('semesters.home',['data'=>$Semesters]);
    }
}
