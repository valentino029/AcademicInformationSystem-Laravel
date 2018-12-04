<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomDetails extends Model
{
    // whitelist
    //protected $fillable = ['classrooms_id','academic_subjects_id','teachers_id']; 
    // blacklist
    protected $guarded = [];

    public function Classrooms(){
        return $this->belongsTo('App\Classrooms','classrooms_id');
    }

    public function AcademicSubjects(){
        return $this->belongsTo('App\AcademicSubjects','academic_subjects_id');
    }

    public function Teachers(){
        return $this->belongsTo('App\Teachers','teachers_id');
    }

    public function ClassroomDetailStudents(){
        return $this->hasMany('App\ClassroomDetailStudents','classrooms_details_id');
    }
    
    
}
