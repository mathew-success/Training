<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $permissions = User::where('id', $userId)->with('roles.permissions')->get();  
        $userPermission = [];
        $combineRoles = [];
        if($permissions){
            foreach($permissions as $permission){
                foreach($permission->roles as $key=>$roles){
                    $userPermission[$key] = $roles->permissions->pluck('name')->toArray();   
                    $combineRoles = array_merge($combineRoles, $userPermission[$key]);
                }
            } 
        }
        $userPermission = array_unique($combineRoles);
        return view('dashboard', compact('userPermission'));
    }

    public function admin()
    {
        return view('admin');
    }
}


