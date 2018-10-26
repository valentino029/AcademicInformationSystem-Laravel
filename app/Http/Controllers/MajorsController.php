<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Majors;

class MajorsController extends Controller
{
    public function index(){
        $Majors = Majors::all();
        return view('majors.home',['data'=>$Majors]);
    }
}
