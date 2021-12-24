<?php

namespace App\Http\Controllers;

use App\Helpers\Organization;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('id','!=',1)->orderBy('id','DESC')->get();
        return view('role.index', compact('roles'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Role is required'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->organization_id = Organization::getOrganizationId();
        
        if($role->save()){
            return redirect()->route('role.create')->with(['message' => 'Role created successfully']);
        }
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
        $role = Role::findOrFail($id);
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Role is required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;

        if($role->save()){
            return redirect()->route('role.index')->with(['message' => 'Role data updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if($role->delete()){
            return redirect()->back()->with(['message' => 'Role Deleted']);
        }
    }
}
