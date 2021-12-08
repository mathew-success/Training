@extends('layouts.user.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Job Details</h3>
                    </div>
                </div>
				<br/>
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th colspan="4"><strong>{{$job->title}}</strong></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>Location :</strong> {{$job->job_location}}</td>
							<td><strong>Job Type :</strong> {{$job->job_type}}</td>
							<td><strong>Job Role :</strong> {{$job->work_role}}</td>
							<td><strong>Company :</strong> {{$job->company->company_name}}</td>
						</tr>
						<tr>
							<td><strong>Experience :</strong> {{ $job->experience_from }} to {{ $job->experience_to }} years</td>
							<td><strong>Leave on saturday :</strong> {{$job->leave_saturday === 1 ? 'Yes':'No'}}</td>
							<td><strong>Working Hours :</strong> {{$job->working_hours_per_week}} hrs / week</td>
							<td><strong>Language :</strong> {{$job->communication}}</td>
						</tr>
						<tr>
							<td><strong>Posted By :</strong> {{ $job->postedby->name }}</td>
							<td colspan="3"><strong>Posted Date :</strong> {{$job->posted_date}}</td>
						</tr>
						<tr>
							<td colspan="4"><strong>Job Description</strong></td>
						</tr>
						<tr>
							<td colspan="4" class="ln_h25">{{$job->description}}</td>
						</tr>
					</tbody>
				</table>
				<form action="{{route('userjob.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
					<input type="hidden" name="job_id" value="{{$job->id}}">
					@if(!$applied_job)
					<button type="submit" class="btn btn-primary">Apply</button>
					@else
					<h6 class="btn btn-info">Applied</h6>
					@endif
				</form>
				@if(session('message'))
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{ session('message') }}
					</div>
				@endif
            </div>
        </div>
    </div>
@endsection
