<?php

namespace App\Http\Controllers;

use App\Helpers\Organization;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Jobs\WelcomeEmail;
use App\Mail\UserMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = auth()->user()->id;
        $orgId = Organization::getOrganizationId();
        if(auth()->user()->id === 1){
            $users = User::where('id','!=',1)->where('organization_id', $orgId)->orderBy('id','DESC')->get();
        }

        $users = QueryBuilder::for(User::class)
                    ->allowedFilters(['name','email'])
                    ->allowedSorts(['name','id'])
                    ->allowedFields(['id', 'name', 'email', 'phone_no'])
                    ->allowedIncludes(['permissions'])
                    // ->allowedAppends(['nameemail'])
                    ->where('id','!=',$currentUser)
                    ->where('organization_id', $orgId)
                    ->orderBy('id','DESC')
                    ->get();
        //$users = User::where('id','!=',$currentUser)->where('organization_id', $orgId)->orderBy('id','DESC')->get();
        return view('users.index', compact('users'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orgId = Organization::getOrganizationId();
        $roles = Role::where('id','!=',1)->where('organization_id', $orgId)->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->organization_id = Organization::getOrganizationId();
        $user->password = Hash::make($request->password);
        $user->save();

        $role = Role::with('permissions')->where('id',$request->role_id)->first();
        $permissionIds = $role->permissions->pluck('id');
        $role->permissions()->attach($permissionIds, ['user_id' => $user->id, 'organization_id' => Organization::getOrganizationId()]);

        $details = [
            'email' => $request->email,
            'password' => $request->password
        ];

        WelcomeEmail::dispatch($details);
        
        return redirect()->route('user.create')->with(['message' => 'User created successfully']);
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
        $user = User::with('permissions')->where('id',$id)->first();//dd($user->permissions->toArray());
        $actualRole = $user->permissions->first();
        if($user->permissions){ 
            $actualRole = $actualRole->id;  
        }
        return view('users.edit', compact('user','roles','actualRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;

        if($user->save()){
            return redirect()->route('user.index')->with(['message' => 'User data updated']);
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
        $this->authorize('delete', 'App\Models\User');

        $user = User::findOrFail($id);

        if($user->delete()){
            return redirect()->back()->with(['message' => 'User Deleted']);
        }
    }
}
