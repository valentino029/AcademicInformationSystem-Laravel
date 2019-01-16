<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomDetails;
use App\ClassroomDetailStudents;
use App\Tugas;
use DB;
use PDF;
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
        $ClassroomDetails = ClassroomDetails::where('teachers_id',$teacher)->get();
        return view('isinilai.home',['data'=>$ClassroomDetails]);
    
    }

    public function indexAdmin()
    {
        $ClassroomDetails = ClassroomDetails::orderBy('classrooms_id','ASC')->get();
        return view('isinilai.homeadmin',['data'=>$ClassroomDetails]);
    
    }

    public function indexStudent()
    {
        $user=Auth::user();
        $students = $user->students->id;
        $ClassroomDetailStudents = ClassroomDetailStudents::where('students_id',$students)->get();
        
        return view('isinilai.homestudent',['data'=>$ClassroomDetailStudents]);
    
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
    public function editTugas($id)
    {
        $tugas = Tugas::where('id',$id)->first();
        
        return view('isinilai.editvalue',compact('tugas'));
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
        
    }

    public function updateTugas(Request $request)
    {
        // dd($request->id);
        Tugas::where('id', $request->id)
        ->update([
            'nama_tugas' => $request->nama_tugas,
            'nilai' => $request->nilai
        ]);
        return back()->withInput();
    }

    public function deleteTugas(Request $request)
    {
        // dd($request->id);
        Tugas::where('id', $request->id)
        ->delete();
        return back();
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

        

        $nilaiuts = ClassroomDetailStudents::where('id','=',$id)->get();
        $hasiluts = collect($nilaiuts)->map(function($value) {
            return [ 'result' => $value['UTS']];
        })->all();
        
        $jumlah = count($resultD);
        $totaluts = (array_sum(array_column($hasiluts, 'result')))*0.2;
        

        $nilaiuas = ClassroomDetailStudents::where('id','=',$id)->get();
        $hasiluas = collect($nilaiuas)->map(function($value) {
            return [ 'result' => $value['UAS']];
        })->all();
        $totaluas = (array_sum(array_column($hasiluas, 'result')))*0.2;
        

        ClassroomDetailStudents::where('id', $id)
        ->update([
            'Tugas' => $totaltugas,
            'Hasil' => $totaltugas+$totaluts+$totaluas
        ]);

        return back()->withInput();


    }

    public function showvalue ($id)
    {
        
        $value = ClassroomDetails::where('id',$id)->first();
        
        return view('isinilai.showvalue',['data'=>$value]);
    }

    public function showvalueStudent ($id)
    {
        $user=Auth::user();
        $students = $user->students->id;
        $value = ClassroomDetailStudents::where('classrooms_details_id',$id)->where('students_id',$students)->firstOrFail();
        
        return view('isinilai.showvalueStudent',['data'=>$value]);
    }

    public function reportPdf($id)
{
    $value = ClassroomDetails::where('id',$id)->first();

    $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
        ->loadView('report.pdfPrint', compact('value'));
    return $pdf->stream();
}

public function reportPdfStudent($id)
{
        $user=Auth::user();
        $students = $user->students->id;
        $value = ClassroomDetailStudents::where('classrooms_details_id',$id)->where('students_id',$students)->firstOrFail();

    $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
        ->loadView('report.pdfPrintStudent', compact('value'));
    return $pdf->stream();
}


}
