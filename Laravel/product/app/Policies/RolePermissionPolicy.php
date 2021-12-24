<?php

namespace App\Policies;

use App\Helpers\Organization;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePermissionPolicy
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

    public function organization()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.create" || $user->permission->name === "organization.index"){
                return true;
            }
        }
    }

    public function rolecreate()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "role.create" || $user->permission->name === "role.index" || $user->permission->name === "role.edit" || $user->permission->name === "role.delete"){
                return true;
            }
        }
    }

    public function rolesList()
    {
        $roles = Role::all();
        foreach($roles as $role){
            if($role->organization_id === Organization::getOrganizationId()){
                return true;
            }
        }
    }

    public function rolesEdit()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "role.edit"){
                return true;
            }
        }
    }

    public function rolesDelete()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "role.delete"){
                return true;
            }
        }
    }

    public function organizationCreate()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.create"){
                return true;
            }
        }
    }

    public function organizationList()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.index"){
                return true;
            }
        }
    }

    public function organizationEdit()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.edit"){
                return true;
            }
        }
    }

    public function organizationDelete()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "organization.delete"){
                return true;
            }
        }
    }

    public function userList()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "user.index"){
                return true;
            }
        }
    }

    public function userCreate()
    {
        $users = RolePermission::where('user_id',auth()->user()->id)->with('permission')->get(); 
        foreach($users as $user){
            if($user->permission->name === "user.create"){
                return true;
            }
        }
    }
}
