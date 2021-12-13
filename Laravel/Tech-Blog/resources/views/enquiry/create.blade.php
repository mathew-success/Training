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
                        <h3>Job enquiry</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('job_enquiry.index')}}" class="btn btn-sm btn-primary">View Job enquiries</a>
					</div>
                </div>
				<br/>
				@if(session('message'))
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('message') }}
				</div>
				@endif
				@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
							{{ $error }}<br/>
						@endforeach
					</div>
				@endif
				<br/>
				<form action="{{route('job_enquiry.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<label>Name : </label>
							<input type="text" name="name" id="" value="{{old('name')}}" class="form-control">	
						</div>
						<div class="col-sm-4">
							<label>Email : </label>
							<input type="text" name="email" id="" value="{{old('email')}}" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Job : </label>
							<select name="job_id" class="form-control">
								<option value="">Select--</option>
								@foreach($jobs as $job)
									<option value="{{ $job->id }}">{{ $job->title }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-4">
							<label>UG : </label>
							<input type="text" name="ug" value="{{old('ug')}}" id="" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>PG : </label>
							<input type="text" name="pg" value="{{old('pg')}}" id="" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>College : </label>
							<input type="text" name="college" value="{{old('college')}}" id="" class="form-control">
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-6">
							<label>University : </label>
							<input type="text" name="university" value="{{old('university')}}" id="" class="form-control">
						</div>
						<div class="col-sm-6">
							<label>Country : </label>
							<select name="country_id" class="form-control">
								<option value="">Select--</option>
								@foreach($countries as $country)
									<option value="{{ $country->id }}">{{ $country->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-12">
							<label>Address : </label>
							<textarea name="address" class="form-control">{{old('address')}}</textarea>
						</div>
					</div>
					<br/>
					<button type="submit" class="btn btn-success btn-block">Save</button>
				</form>
            </div>
        </div>
    </div>
</x-app-layout>
