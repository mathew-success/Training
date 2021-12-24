<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',1)->with('roles')->get(); 
        return view('assign/index', compact('users'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id','!=',1)->orderBy('id', 'DESC')->get(); 
        $permissions = Permission::all();
        $roles = Role::where('id','!=',1)->orderBy('id','DESC')->get();
        return view('assign/create', compact('users','permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'role_id' => 'required',
            'permission_id' => 'required',
        ],[
            'user_id.required' => 'User is required',
            'role_id.required' => 'Role is required',
            'permission_id.required' => 'Permission is required',
        ]);

        $userId = $request->user_id; 
        $roleId = $request->role_id;
        $permissionIds = $request->permission_id;
        $user = User::find($userId);
        $user->roles()->attach($roleId);
        $user->permissions()->attach($permissionIds);
        
        return redirect()->route('assign-permission.create')->with(['message' => 'Permissions assigned successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = $user->roles;
        return view('assign/show', compact('roles'))->with('no',1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::where('id','!=',1)->get();
        $user = User::where('id',$id)->with('roles')->first(); 
        $assigned_roles = $user->roles->pluck('name')->toArray(); 
        return view('assign/edit', compact('user','roles','assigned_roles'))->with('no',1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->save();
        $roleIds = $request->role_id;
        $user->roles()->sync($roleIds);

        return redirect()->route('assign-permission.index')->with(['message' => 'User details updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = User::find($id);
        
        if($role->delete()){
            return redirect()->back()->with(['message' => 'User Deleted']);
        }
    }
}
