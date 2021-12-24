<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }

    public function role(){
        return $this->hasOne(RolePermission::class);
    }
}
