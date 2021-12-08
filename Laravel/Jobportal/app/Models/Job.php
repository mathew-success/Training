<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function skill(){
        return $this->hasOne(JobSkill::class,'job_id','id');
    }

    public function qualification(){
        return $this->hasOne(JobQualification::class,'job_id','id');
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function postedby(){
        return $this->belongsTo(User::class,'posted_by','id');
    }
}
