<?php

namespace App\Http\Controllers;

use App\Helpers\Organization;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class AssignRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $roles = QueryBuilder::for(Role::class)
                    ->allowedFilters(['name','organization_id'])
                    ->allowedSorts(['name','id'])
                    ->allowedFields(['id', 'name', 'organization_id'])
                    ->allowedIncludes(['permissions'])
                    ->where('id','!=',1)
                    ->where('organization_id',Organization::getOrganizationId())
                    ->orderBy('id','DESC')
                    ->get();
                    
        //$roles = Role::where('id','!=',1)->where('organization_id',Organization::getOrganizationId())->with('permissions')->get(); 

        return view('assignRole.index', compact('roles'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = auth()->user()->id;
        $currentUserRole = Role::where('organization_id',Organization::getOrganizationId())->first();
        $allpermissions = Permission::all();
        $permissions = RolePermission::with('permission')->where('organization_id', Organization::getOrganizationId())->where('user_id',auth()->user()->id)->get();

        $roles = Role::where('id','!=',1)->get();
        return view('assignRole.create', compact('permissions','roles','allpermissions','userId'));
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
        $role->organization_id = Organization::getOrganizationId();
        $role->save();

        $RoleId = $role->id;
        $permissionIds = $request->permission_id; 
        $role = Role::find($RoleId); 
        $role->permissions()->attach($permissionIds, ['user_id' => auth()->user()->id, 'organization_id' => 1]);
        
        return redirect()->route('assign-role.create')->with(['message' => 'Role created successfully']);
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
        return view('assignRole.edit', compact('role','permissions','assigned_permissions'))->with('no',1);
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

        return redirect()->route('assign-role.index')->with(['message' => 'Role details updated']);
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
