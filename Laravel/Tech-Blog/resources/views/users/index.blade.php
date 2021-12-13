@extends('layouts.employer.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Job</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('job.create')}}" class="btn btn-sm btn-primary">Add Job</a>
					</div>
                </div>
				<br/>

				@if(session('message'))
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{ session('message') }}
					</div>
				@endif

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Title</th>
							<th>Location</th>
							<th>Job Type</th>
							<th>Job Role</th>
							<th>Company Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($jobs)
							@foreach($jobs as $job)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$job->title}}</td>
								<td>{{$job->job_location}}</td>
								<td>{{$job->job_type}}</td>
								<td>{{$job->work_role}}</td>
								<td>{{$job->company->company_name}}</td>
								<td><a href="{{route('job.destroy',$job->id)}}">Delete</a></td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
            </div>
        </div>
    </div>
@endsection
