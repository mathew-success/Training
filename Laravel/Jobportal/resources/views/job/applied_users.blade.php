@extends('layouts.employer.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Applied Users</h3>
                    </div>
                </div>
				<br/>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Job Title</th>
							<th>Company Name</th>
							<th>Job Role</th>
							<th>User Name</th>
							<th>User ID</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($jobs)
							@foreach($jobs as $job)
							@if($usersCompany === $job->job->company->id)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$job->job->title}}</td>
								<td>{{$job->job->company->company_name}}</td>
								<td>{{$job->job->work_role}}</td>
								<td>{{$job->user->name}}</td>
								<td>{{$job->user->user_id}}</td>
								<td>{{$job->user->email}}</td>
								<td>{{$job->user->phone_no}}</td>
								<td>
									<a href="{{ route('job.usersinfo',$job->user->id) }}" class="btn btn-sm btn-primary">know more</a>
								</td>
							</tr>
							@endif
							@endforeach
						@endif
					</tbody>
				</table>
            </div>
        </div>
    </div>
@endsection
