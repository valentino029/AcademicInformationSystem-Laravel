<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grades extends Model
{
    // whitelist
    //protected $fillable = ['grade_code','grade_name']; 
    // blacklist
    protected $guarded = [];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function Semesters(){
        return $this->belongsTo('App\Semesters');
    }

    public function Majors(){
        return $this->hasMany('App\Majors','grades_id');
    }
}
