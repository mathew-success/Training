<x-app-layout>
    <x-slot name="header">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Enquiry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Job Enquiry</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('job_enquiry.create')}}" class="btn btn-sm btn-primary">Add job enquiry</a>
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
							<th>Name</th>
							<th>Email</th>
							<th>Job</th>
							<th>UG</th>
							<th>PG</th>
							<th>College</th>
							<th>University</th>
							<th>Country</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($jobs)
							@foreach($jobs as $job)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$job->name}}</td>
								<td>{{$job->email}}</td>
								<td>{{$job->job->title}}</td>
								<td>{{$job->ug}}</td>
								<td>{{$job->pg}}</td>
								<td>{{$job->college}}</td>
								<td>{{$job->university}}</td>
								<td>{{$job->country->name}}</td>
								<td>{{$job->address}}</td>
								<td><a href="{{route('job_enquiry.destroy',$job->id)}}">Delete</a></td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
            </div>
        </div>
    </div>
</x-app-layout>
