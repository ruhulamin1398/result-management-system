<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;

    function student(){
        return $this->belongsTo(student::class);
    } function course(){
        return $this->belongsTo(course::class);
    }
    
}
