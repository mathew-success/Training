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
                        <h3>Add the blog technologies here!</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('blog_tech.index')}}" class="btn btn-sm btn-primary">View List</a>
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
				<form action="{{route('blog_tech.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<label>Select Blog : </label>
					<select class="form-control" name="blog_id">
						<option value="">Select-</option>
						@foreach($blogs as $blog)
						<option value="{{ $blog->id }}">{{$blog->title}}</option>
						@endforeach
					</select>
					<br/>
					<label>Select Technology : </label>
					<select class="form-control" name="technology_id">
						<option value="">Select-</option>
						@foreach($technologies as $technology)
						<option value="{{ $technology->id }}">{{$technology->name}}</option>
						@endforeach
					</select>
					<br/>
					<button type="submit" class="btn btn-success btn-block">Save</button>
				</form>
            </div>
        </div>
    </div>
</x-app-layout>
