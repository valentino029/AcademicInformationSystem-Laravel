<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semesters extends Model
{
    // whitelist
    //protected $fillable = ['semester_code','semester_name','academic_years_id']; 
    // blacklist
    protected $guarded = [];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function AcademicYears(){
        return $this->belongsTo('App\AcademicYears');
    }

    public function Grades(){
        return $this->hasMany('App\Grades','semesters_id');
    }

}