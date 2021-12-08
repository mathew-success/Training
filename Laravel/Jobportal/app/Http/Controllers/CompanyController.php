<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyEmployer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = CompanyEmployer::with(['company','employer'])->get();
        return view('company/index', compact('companies'))->with(['no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'company_name.required' => 'Company name is required',
            'location.required' => 'Location is required',
            'website.required' => 'Website is required',
            'name.required' => 'Employee name is required',
            'email.required' => 'Email is required',
            'phone_no.required' => 'Phone number is required',
            'password.required' => 'Password is required',
        ];

        $request->validate([
            'company_name' => 'required|min:3',
            'location' => 'required',
            'website' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required|numeric|digits:10',
            'password' => 'required|confirmed',
        ], $message);

        $company = new Company();
        $company->company_name = $request->company_name;
        $company->location = $request->location;
        $company->website = $request->website;
        $company->save();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_id = "US".rand(10000,100000);
        $user->password = Hash::make($request->password);
        $user->role = 'employer';
        $user->phone_no = $request->phone_no;

        if($company->save() && $user->save()){
            $companyEmp = new CompanyEmployer();
            $companyEmp->company_id = $company->id;
            $companyEmp->user_id = $user->id;
            $companyEmp->save();
            return redirect()->back()->with('message','Company saved successfully');
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
        $company = CompanyEmployer::with(['company','employer'])->first();
        return view('company/edit', compact('company'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if($company->delete()){
            return redirect()->back()->with('message','Company data deleted');
        }
    }
}
