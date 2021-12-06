<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTechnology extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'technology_id'
    ];

    public function jobs(){
        return $this->belongsTo(Job::class,'job_id','id');
    }

    public function technology(){
        return $this->belongsTo(Technology::class,'technology_id','id');
    }
}
