<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYears extends Model
{
   
    // whitelist
    //protected $fillable = ['year_code','year_name']; 
    // blacklist
    protected $guarded = [];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function Semesters(){
        return $this->hasMany('App\Semesters','academic_years_id');
    }

    
}