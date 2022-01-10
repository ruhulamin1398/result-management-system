<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use SoftDeletes;
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
    public function results()
    {
        return $this->hasMany(result::class);
    }public function semester()
    {
        return $this->belongsTo(semester::class);
    }public function user()
    {
        return $this->belongsTo(User::class);
    }

}
