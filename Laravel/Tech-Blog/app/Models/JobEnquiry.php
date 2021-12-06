<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'job_id',
        'ug',
        'pg',
        'college',
        'university',
        'country_id',
        'address'
    ];

    public function job(){
        return $this->belongsTo(Job::class,'job_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
