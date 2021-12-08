<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function appliedjobs()
    {
        $user_id = auth()->user()->id;
        $jobs = JobApply::where('user_id', $user_id)->with(['job'])->get();
        return view('user/applied_jobs', compact('jobs'))->with(['no'=>1]);
    }

    public function applied_user_info($id)
    {
        $jobs = JobApply::where('user_id',$id)->with(['job','user'])->first();
        return view('user/applied_user_details', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'job_id.required' => 'Job is required'
        ];

        $request->validate([
            'job_id' => 'required'
        ], $message);
        
        $job = new JobApply();
        $job->user_id = auth()->user()->id;
        $job->job_id = $request->job_id;
        
        if($job->save()){
            return redirect()->back()->with('message','Job applied successfully');
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
        $applied_job = JobApply::where('job_id',$id)->exists();
        $job = Job::where('id', $id)->with(['skill','qualification','company','postedby'])->first();
        return view('user/job-details', compact('job','applied_job'));
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
        //
    }
}
