@extends('layouts.user.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Applied Jobs</h3>
                    </div>
                </div>
				<br/>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Job Title</th>
							<th>Location</th>
							<th>Job Type</th>
							<th>Job Role</th>
							<th>Company Name</th>
						</tr>
					</thead>
					<tbody>
						@if($jobs)
							@foreach($jobs as $job)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$job->job->title}}</td>
								<td>{{$job->job->job_location}}</td>
								<td>{{$job->job->job_type}}</td>
								<td>{{$job->job->work_role}}</td>
								<td>{{$job->job->company->company_name}}</td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
            </div>
        </div>
    </div>
@endsection
