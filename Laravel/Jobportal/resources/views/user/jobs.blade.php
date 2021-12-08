@extends('layouts.user.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Jobs</h3>
                    </div>
                </div>
				<br/>

				<div class="row">
					@foreach($jobs as $job)
					<div class="col-sm-3">
						<div class="job_card">
							<h5>{{$job->title}}</h5>
							<hr/>
							<p>Location : {{$job->job_location}}</p>
							<p>Job Type : {{$job->job_type}}</p>
							<p>Job Role : {{$job->work_role}}</p>
							<p>Company : {{$job->company->company_name}}</p>
							<a href="{{route('user.apply',$job->id)}}" class="btn btn-sm btn-primary">Know More</a>
						</div>
					</div>
					@endforeach
				</div>
            </div>
        </div>
    </div>
@endsection
