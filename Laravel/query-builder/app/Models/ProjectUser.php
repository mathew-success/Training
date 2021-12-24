<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function projects(){
        return $this->belongsTo(Project::class);
    }

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function workspace(){
        return $this->belongsTo(Workspace::class);
    }
}
