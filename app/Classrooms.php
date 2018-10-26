<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classrooms extends Model
{
    // whitelist
    protected $fillable = ['classroom_code','classroom_name']; 
    // blacklist
    protected $guarded = ['id'];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function Majors(){
        return $this->belongsTo('App\Majors');
    }
}
