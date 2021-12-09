@extends('layouts.user.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Job Applied User Details</h3>
                    </div>
                </div>
				<br/>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th colspan="4"><strong>User Information</strong></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>User Name :</strong> {{$job->user->name}}</td>
							<td><strong>Email :</strong> {{$job->user->email}}</td>
							<td><strong>phone Number :</strong> {{$job->user->phone_no}}</td>
						</tr>
					</tbody>
				</table>
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th colspan="4"><strong>Job Information</strong></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th colspan="4"><strong>{{$job->job->title}}</strong></th>
						</tr>
						<tr>
							<td><strong>Location :</strong> {{$job->job->job_location}}</td>
							<td><strong>Job Type :</strong> {{$job->job->job_type}}</td>
							<td><strong>Job Role :</strong> {{$job->job->work_role}}</td>
							<td><strong>Company :</strong> {{$job->job->company->company_name}}</td>
						</tr>
						<tr>
							<td><strong>Experience :</strong> {{ $job->job->experience_from }} to {{ $job->job->experience_to }} years</td>
							<td><strong>Leave on saturday :</strong> {{$job->job->leave_saturday === 1 ? 'Yes':'No'}}</td>
							<td><strong>Working Hours :</strong> {{$job->job->working_hours_per_week}} hrs / week</td>
							<td><strong>Language :</strong> {{$job->job->communication}}</td>
						</tr>
						<tr>
							<td><strong>Posted By :</strong> {{ $job->job->postedby->name }}</td>
							<td colspan="3"><strong>Posted Date :</strong> {{$job->job->posted_date}}</td>
						</tr>
						<tr>
							<td colspan="4"><strong>Job Description</strong></td>
						</tr>
						<tr>
							<td colspan="4" class="ln_h25">{{$job->job->description}}</td>
						</tr>
					</tbody>
				</table>
            </div>
        </div>
    </div>
@endsection
