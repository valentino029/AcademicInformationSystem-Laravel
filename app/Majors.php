<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Majors extends Model
{
    // whitelist
    //protected $fillable = ['major_code','major_name']; 
    // blacklist
    protected $guarded = [];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function Grades(){
        return $this->belongsTo('App\Grades');
    }

    public function Classrooms(){
        return $this->hasMany('App\Classrooms','majors_id');
    }

    public function AcademicSubjects(){
        return $this->hasMany('App\AcademicSubjects','majors_id');
    }
}
