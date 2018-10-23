<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semesters extends Model
{
    // whitelist
    protected $fillable = ['semester_code','semester_name']; 
    // blacklist
    protected $guarded = ['id'];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function academic_years(){
        return $this->belongsTo('App\Academic_years');
    }

}