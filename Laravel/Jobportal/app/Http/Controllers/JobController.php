<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyEmployer;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\JobQualification;
use App\Models\JobSkill;
use App\Models\User;
use Carbon\Carbon;
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
        $userId = auth()->user()->id;
        $employer = CompanyEmployer::where('user_id',$userId)->first();
        $jobs = Job::where('company_id', $employer->company_id)->with(['skill','qualification','company'])->orderBy('id', 'DESC')->get(); 
        return view('job/index', compact('jobs'))->with(['no'=>1]);
    }

    public function appliedusers()
    {
        $userId = auth()->user()->id;
        $employer = CompanyEmployer::where('user_id',$userId)->first(); 
        $usersCompany = $employer->company_id;
        $jobs = JobApply::with(['job'])->orderBy('id', 'DESC')->get(); 
        return view('job/applied_users', compact('jobs','usersCompany'))->with(['no'=>1]);
    }

    public function applied_user_info($id)
    {
        $job = JobApply::where('user_id',$id)->with(['job','user'])->first();
        return view('job/applied_user_details', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = auth()->user()->id;
        $employer = Company::with('employer')->get()->toArray(); 
        $user = User::where('id',$userId)->with('employer')->first();
        $user_company = $user->employer->company_id; 
        $skills = JobSkill::all();
        $companies = Company::where('id',$user_company)->get();
        return view('job/create', compact('companies','skills'));
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
            'company_id.required' => 'Company name is required',
            'job_location.required' => 'Location is required',
            'job_type.required' => 'Job type is required',
            'title.required' => 'Title is required'
        ];

        $request->validate([
            'title' => 'required',
            'experience_from' => 'required',
            'experience_to' => 'required',
            'job_location' => 'required',
            'job_type' => 'required',
            'working_hours_per_week' => 'required',
            'description' => 'required',
            'work_role' => 'required',
            'communication' => 'required',
            'company_id' => 'required',
            'skills' => 'required',
            'higher_secondary' => 'required',
            'degree' => 'required',
            'specialization' => 'required',
            'passed_out_from' => 'required',
            'passed_out_to' => 'required',
        ], $message);
        
        $job = new Job();
        $job->title = $request->title;
        $job->experience_from = $request->experience_from;
        $job->experience_to = $request->experience_to;
        $job->job_location = $request->job_location;
        $job->job_type = $request->job_type;
        $job->leave_saturday = $request->leave_saturday;
        $job->working_hours_per_week = $request->working_hours_per_week;
        $job->description = $request->description;
        $job->work_role = $request->work_role;
        $job->communication = $request->communication;
        $job->company_id = $request->company_id;
        $job->posted_by = auth()->user()->id;
        $job->posted_date = Carbon::now()->toDateString();
        $job->save();
        $skillsArr = $request->skills;
        foreach($skillsArr as $skilldata){
            $skill = new JobSkill();
            $skill->job_id = $job->id;
            $skill->skills = $skilldata;
            $skill->save();
        }

        $qualification = new JobQualification();
        $qualification->job_id = $job->id;
        $qualification->higher_secondary = $request->higher_secondary;
        $qualification->secondary = $request->secondary;
        $qualification->degree = $request->degree;
        $qualification->specialization = $request->specialization;
        $qualification->passed_out_from = $request->passed_out_from;
        $qualification->passed_out_to = $request->passed_out_to;
        
        if($qualification->save()){
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
            return redirect()->back()->with('message','Job data deleted');
        }
    }
}
