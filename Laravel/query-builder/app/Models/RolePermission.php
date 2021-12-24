<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function permission(){
        return $this->belongsTo(Permission::class);
    }

    public function organization(){
        return $this->belongsTo(Organization::class);
    }
}
