<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicSubjects extends Model
{
    // whitelist
    //protected $fillable = ['academic_subject_code','academic_subject_name']; 
    // blacklist
    protected $guarded = [];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function Majors(){
        return $this->belongsTo('App\Majors');
    }

    public function ClassroomDetails(){
        return $this->hasMany('App\ClassroomDetails');
    }
}
