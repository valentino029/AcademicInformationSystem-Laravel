<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    // whitelist
    //protected $fillable = ['student_nis','student_nisn','student_name','student_major','student_gender']; 
    // blacklist
    protected $guarded = [];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User','users_id');
    }

    public function ClassroomDetailStudents(){
        return $this->hasMany('App\ClassroomDetailStudents','students_id');
    }

    public function Tugas(){
        return $this->hasMany('App\Tugas','classroom_detail_students');
    }
}
