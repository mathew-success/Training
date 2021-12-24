<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    
    public function organization(){
        return $this->belongsTo(Organization::class);
    }
    
    public function workspace(){
        return $this->belongsTo(Workspace::class);
    }
}
