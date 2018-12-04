<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class StudentAccountController extends Controller
{
    public function index(){
        $User = User::where('level','=',3)->get();
        
        return view('studentaccount.home',['data'=>$User]);
    }

    public function add(){
        return view('studentaccount.add');
    }

    public function store(Request $request){

        User::create([
         'level' => $request->level,
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password)
         ]);
         return redirect('/StudentAccount');
    }
}
