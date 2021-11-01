<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $guarded=[];




    public function session()
    {
        return $this->belongsTo(studySession::class,'session_id','id');
    }
    public function department()
    {
        return $this->belongsTo(department::class);
    }

}
