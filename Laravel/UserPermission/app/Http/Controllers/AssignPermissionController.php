<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AssignPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('id','!=',1)->with('permissions')->get();
        return view('groupingRole.index', compact('roles'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::where('id','!=',1)->get();
        return view('groupingRole.create', compact('permissions','roles'));
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
            'role_name' => 'required',
            'permission_id' => 'required',
        ],[
            'role_name.required' => 'Role is required',
            'permission_id.required' => 'Permission value is required'
        ]);

        $role = new Role();
        $role->name = $request->role_name;
        $role->save();

        $RoleId = $role->id;
        $permissionIds = $request->permission_id; 
        $role = Role::find($RoleId); 
        $role->permissions()->attach($permissionIds);
        
        return redirect()->route('assign-permission.create')->with(['message' => 'Roles assigned successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $role = Role::where('id',$id)->with('permissions')->first(); 
        $assigned_permissions = $role->permissions->pluck('name')->toArray();
        return view('groupingRole/edit', compact('role','permissions','assigned_permissions'))->with('no',1);
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
        $role = Role::find($id);
        $role->name = $request->role_name; 
        $role->save();
        $permissionIds = $request->permission_id;
        $role->permissions()->sync($permissionIds);

        return redirect()->route('assign-permission.index')->with(['message' => 'Role details updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        
        if($role->delete()){
            return redirect()->back()->with(['message' => 'Role Deleted']);
        }
    }
}
