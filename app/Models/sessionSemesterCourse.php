<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sessionSemesterCourse extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function course()
    {
        return $this->belongsTo(course::class);
    } 

}
