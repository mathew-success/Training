<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('job/index', compact('jobs'))->with(['no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('job/create', compact('countries'));
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
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'location.required' => 'Location is required',
            'country_id.required' => 'Country is required',
            'type.required' => 'Job type is required',
        ];

        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'location' => 'required',
            'country_id' => 'required',
            'type' => 'required',
        ], $message);

        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->location = $request->location;
        $job->country_id = $request->country_id;
        $job->type = $request->type;

        if($job->save()){
            return redirect()->back()->with('message','Job saved successfully');
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
        $job = Job::find($id);
        if($job->delete()){
            return redirect()->back()->with('message','Job deleted');
        }
    }
}
