<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomDetails;
use App\ClassroomDetailStudents;
use App\Tugas;
use DB;
use Illuminate\Support\Facades\Auth;
class IsinilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $teacher = $user->teachers->id;
        // $teacher = Auth::user()->teachers->id;
        // dd($teacher);
        // $ClassroomDetails = ClassroomDetails::all();
        // $ClassroomDetails = ClassroomDetails::whereHas('users', function ($query) {
        //     $teacher = Auth::user()->teachers->id;
        //     $query->where($teacher, '=', $teacher);
        // })->get();
        $ClassroomDetails = ClassroomDetails::where('teachers_id',$teacher)->get();
        return view('isinilai.home',['data'=>$ClassroomDetails]);
    
    }

    public function indexAdmin()
    {
        $ClassroomDetails = ClassroomDetails::get();
        return view('isinilai.homeadmin',['data'=>$ClassroomDetails]);
    
    }

    public function tugasIndex($id)
    {
        $tugas = ClassroomDetailStudents::where('id',$id)->first();
        return view('isinilai.tugasHome',['data'=>$tugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function addTugas($id)
    {
        $tugas = ClassroomDetailStudents::where('id',$id)->first();
        return view('isinilai.addTugas',['data'=>$tugas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function tugasStore(Request $request)
    {
        Tugas::create([
         'classroom_detail_students' => $request->classroom_detail_students,
         'nama_tugas' => $request->nama_tugas,
         'nilai' => $request->nilai
         ]);
         return redirect()->action('IsinilaiController@tugasIndex', ['id' => $request->classroom_detail_students]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inputvalue($id)
    {
        // dd($id);
        $murid = ClassroomDetails::where('id',$id)->first();
        // dd($murid->ClassroomDetailStudents);
        return view('isinilai.murid',['data'=>$murid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateUTS(Request $request)
    {
        // dd($request->id);
        ClassroomDetailStudents::where('id', $request->id)
        ->update([
            'UTS' => $request->UTS
        ]);
        return back()->withInput();
    }

    public function updateUAS(Request $request)
    {
        // dd($request->id);
        ClassroomDetailStudents::where('id', $request->id)
        ->update([
            'UAS' => $request->UAS
        ]);
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function nilaiAkhir($id)
    {
        $nilai = Tugas::where('classroom_detail_students','=',$id)->get();
        
        $resultD = collect($nilai)->map(function($value) {
            return [ 'result' => $value['nilai']];
        })->all();
        $jumlah = count($resultD);
        $totaltugas = (array_sum(array_column($resultD, 'result'))/$jumlah)*0.6;

        // dd($totaltugas);

        $nilaiuts = ClassroomDetailStudents::where('id','=',$id)->get();
        $hasiluts = collect($nilaiuts)->map(function($value) {
            return [ 'result' => $value['UTS']];
        })->all();
        
        $jumlah = count($resultD);
        $totaluts = (array_sum(array_column($hasiluts, 'result')))*0.2;
        // dd($totaluts);

        $nilaiuas = ClassroomDetailStudents::where('id','=',$id)->get();
        $hasiluas = collect($nilaiuas)->map(function($value) {
            return [ 'result' => $value['UAS']];
        })->all();
        $totaluas = (array_sum(array_column($hasiluas, 'result')))*0.2;
        // dd($totaltugas+$totaluts+$totaluas);

        ClassroomDetailStudents::where('id', $id)
        ->update([
            'Tugas' => $totaltugas,
            'Hasil' => $totaltugas+$totaluts+$totaluas
        ]);

        return back()->withInput();


    }

    public function showvalue ($id)
    {
        // dd($id);
        $value = ClassroomDetails::where('id',$id)->first();
        // dd($murid->ClassroomDetailStudents);
        return view('isinilai.showvalue',['data'=>$value]);
    }


}
