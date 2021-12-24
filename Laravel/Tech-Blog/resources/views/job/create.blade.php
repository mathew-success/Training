<x-app-layout>
    <x-slot name="header">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Add the jobs here!</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('job.index')}}" class="btn btn-sm btn-primary">View jobs</a>
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
				<form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<label>Title : </label>
					<input type="text" name="title" id="" value="{{old('title')}}" class="form-control">
					<br/>
					<label>Description : </label>
					<textarea name="description" class="form-control">{{old('description')}}</textarea>
					<br/>
					<label>Location : </label>
					<input type="text" name="location" value="{{old('location')}}" id="" class="form-control">
					<br/>
					<label>Country : </label>
					<select name="country_id" class="form-control">
						<option value="">Select--</option>
						@foreach($countries as $country)
							<option value="{{ $country->id }}">{{ $country->name }}</option>
						@endforeach
					</select>
					<br/>
					<label>Job type : </label>
					<select name="type" class="form-control">
						<option value="">Select--</option>
						<option value="Part Time">Part Time</option>
						<option value="Full Time">Full Time</option>
					</select>
					<br/>
					<button type="submit" class="btn btn-success btn-block">Save</button>
				</form>
            </div>
        </div>
    </div>
</x-app-layout>
