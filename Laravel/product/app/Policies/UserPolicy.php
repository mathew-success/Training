<?php

namespace App\Policies;

use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "user.edit"){
                return true;
            }
        }
    }

    public function delete()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "user.delete"){
                return true;
            }
        }
    }

    public function edit()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "user.edit"){
                return true;
            }
        }
    }
}
