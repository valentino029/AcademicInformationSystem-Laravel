<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomDetailStudents extends Model
{
    // whitelist
    //protected $fillable = ['classrooms_id','academic_subjects_id','teachers_id']; 
    // blacklist
    protected $guarded = [];

    public function ClassroomsDetails(){
        return $this->belongsTo('App\ClassroomsDetails','classrooms_details_id');
    }

    public function Students(){
        return $this->belongsTo('App\Students','students_id');
    }

    

    public function tugas(){
        return $this->hasMany('App\Tugas','classroom_detail_students');
    }
}
