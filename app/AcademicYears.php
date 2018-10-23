<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYears extends Model
{
   
    // whitelist
    protected $fillable = ['academic_code','academic_name']; 
    // blacklist
    protected $guarded = ['id'];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function semesters(){
        return $this->hasMany('App\Semesters','academic_years_id');
    }

    
}