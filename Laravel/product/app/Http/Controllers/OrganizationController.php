<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationStoreRequest;
use App\Http\Requests\OrganizationUpdateRequest;
use App\Models\Organization;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = QueryBuilder::for(Organization::class)
                        ->allowedFilters(['name'])
                        ->allowedSorts(['name','id'])
                        ->allowedFields(['id', 'name'])
                        ->allowedIncludes(['user'])
                        ->allowedFilters([AllowedFilter::exact('name')])
                        ->where('id','!=',1)
                        ->orderBy('id','DESC')
                        ->get();
        //return $organizations = Organization::with('user')->where('id','!=',1)->orderBy('id','DESC')->get(); 
        return view('organizations.index', compact('organizations'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('id','!=',1)->get();
        return view('organizations.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationStoreRequest $request)
    {
        $organization = new Organization();
        $organization->name = $request->org_name;
        $organization->save();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->organization_id = $organization->id;
        $user->password = Hash::make($request->password);
        $user->save();

        $role = Role::find($request->role_id); 
        $getPermissions = Role::with('permissions')->where('id',$request->role_id)->first(); 
        $permissionIds = $getPermissions->permissions->pluck('id');
        $role->permissions()->attach($permissionIds, ['user_id' => $user->id, 'organization_id' => $organization->id]);
        
        return redirect()->route('organization.create')->with(['message' => 'Organization created successfully']);
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
        $roles = Role::where('id','!=',1)->get(); 
        $organization = Organization::with(['user','role','role.role'])->findOrFail($id);
        $actualRole = $organization->role;
        return view('organizations.edit', compact('organization','actualRole','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationUpdateRequest $request, $id)
    {
        $organization = Organization::with(['user','role','role.role'])->findOrFail($id); 
        $organization->name = $request->org_name;
        $organization->save(); 

        $user = User::with('roles')->find($organization->user->id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->organization_id = $organization->id;
        $user->password = Hash::make($request->password);
        $user->save();

        $role = Role::find($user->roles->pluck('id')->first()); 
        $getPermissions = Role::with('permissions')->where('id',$request->role_id)->first(); 
        $permissionIds = $getPermissions->permissions->pluck('id'); 
        $role->permissions()->sync($permissionIds, ['user_id' => $user->id, 'organization_id' => $organization->id]);

        if($organization->save()){
            return redirect()->route('organization.index')->with(['message' => 'Organization data updated']);
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
        $organization = Organization::findOrFail($id);

        if($organization->delete()){
            return redirect()->back()->with(['message' => 'Organization Deleted']);
        }
    }
}
