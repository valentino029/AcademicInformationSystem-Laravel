<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    // whitelist
    //protected $fillable = ['teacher_identy_number','teacher_nip','teacher_name']; 
    // blacklist
    protected $guarded = [];

    use softDeletes;
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User','users_id');
    }

    public function ClassroomDetails(){
        return $this->hasMany('App\ClassroomDetails');
    }
}
