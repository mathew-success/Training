<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Job;
use App\Models\JobEnquiry;
use Illuminate\Http\Request;

class JobEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobEnquiry::with(['job','country'])->get();
        return view('enquiry/index', compact('jobs'))->with(['no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        $countries = Country::all();
        return view('enquiry/create', compact('jobs','countries'));
    }

    public function applyjob()
    {
        $jobs = Job::all();
        $countries = Country::all();
        return view('front/apply_job', compact('jobs','countries'));
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
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'job_id.required' => 'Job is required',
            'ug.required' => 'UG data is required',
            'pg.required' => 'PG data is required',
            'college.required' => 'College is required',
            'university.required' => 'University is required',
            'country_id.required' => 'Country is required',
            'address.required' => 'Address is required',
        ];

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'job_id' => 'required',
            'ug' => 'required',
            'pg' => 'sometimes|required',
            'college' => 'required',
            'university' => 'required',
            'country_id' => 'required',
            'address' => 'required',
        ], $message);

        $job = new JobEnquiry();
        $job->name = $request->name;
        $job->email = $request->email;
        $job->job_id = $request->job_id;
        $job->ug = $request->ug;
        $job->pg = $request->pg;
        $job->college = $request->college;
        $job->university = $request->university;
        $job->country_id = $request->country_id;
        $job->address = $request->address;

        if($job->save()){
            return redirect()->back()->with('message','Data saved successfully');
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
        //
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
        $job = JobEnquiry::find($id);
        if($job->delete()){
            return redirect()->back()->with('message','Data is deleted');
        }
    }
}
