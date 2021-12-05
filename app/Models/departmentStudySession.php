<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departmentStudySession extends Model
{
    use HasFactory;


    function department(){
        return $this->belongsTo(department::class);
    } function session(){
        return $this->belongsTo(studySession::class,'session_id');
    }

}
