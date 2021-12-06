<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobTechnology;
use App\Models\Technology;
use Illuminate\Http\Request;

class JobTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobTechnology::with(['jobs','technology'])->get();
        return view('jobTech/index', compact('jobs'))->with(['no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        $technologies = Technology::all();
        return view('jobTech/create', compact('jobs','technologies'));
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
            'job_id.required' => 'Job is required',
            'technology_id.required' => 'Technology is required'
        ];

        $request->validate([
            'job_id' => 'required',
            'technology_id' => 'required'
        ], $message);

        $blog = new JobTechnology();
        $blog->job_id = $request->job_id;
        $blog->technology_id = $request->technology_id;

        if($blog->save()){
            return redirect()->back()->with('message','Job and technology is associated');
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
        $job = JobTechnology::find($id);
        if($job->delete()){
            return redirect()->back()->with('message','Job technology deleted');
        }
    }
}
