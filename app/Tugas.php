<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
	protected $guarded = [];
    public function ClassroomDetailStudents(){
        return $this->belongsTo('App\ClassroomDetailStudents','classroom_detail_students');
    }
}
