<?php

namespace App\Policies;

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

    public function page(User $user)
    {
        foreach($user->roles as $role){
            if($role->name === 'Super Admin' || $role->name === 'Admin'){
                return true;
            }
        }
    }

    public function delete(User $user)
    {
        foreach($user->roles as $role){
            if($role->name === 'Super Admin'){
                return true;
            }
        }
    }
}
