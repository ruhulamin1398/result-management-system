<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departmentStudySession extends Model
{
    use HasFactory;
    use SoftDeletes;

    function department(){
        return $this->belongsTo(department::class);
    } function session(){
        return $this->belongsTo(studySession::class,'session_id');
    }

}
