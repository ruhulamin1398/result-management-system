<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class result extends Model
{
    use HasFactory;
    use SoftDeletes;

    function student(){
        return $this->belongsTo(student::class);
    } function course(){
        return $this->belongsTo(course::class);
    }
    
}
