<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmployer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function employer(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
