<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AssignRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',1)->with('roles')->get(); 
        return view('assignRole/index', compact('users'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id','!=',1)->orderBy('id', 'DESC')->get();
        $roles = Role::where('id','!=',1)->get();
        return view('assignRole/create', compact('users','roles'));
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
        ],[
            'user_id.required' => 'User is required',
            'role_id.required' => 'Role is required'
        ]);

        $userId = $request->user_id;
        $RoleIds = $request->role_id;
        $user = User::find($userId);
        $user->roles()->attach($RoleIds);
        
        return redirect()->route('assign-role.create')->with(['message' => 'Roles assigned successfully']);
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
        return view('assignRole/show', compact('roles'))->with('no',1);
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
        return view('assignRole/edit', compact('user','roles','assigned_roles'))->with('no',1);
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

        return redirect()->route('assign-role.index')->with(['message' => 'User details updated']);
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
