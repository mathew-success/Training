<?php

namespace App\Policies;

use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
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

    public function organization(RolePermission $users)
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.create" && $user->permission->name === "organization.index"){
                return true;
            }
        }
    }

    public function create(RolePermission $users)
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.create"){
                return true;
            }
        }
    }

    public function list(RolePermission $users)
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.index"){
                return true;
            }
        }
    }
}
