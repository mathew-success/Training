<x-app-layout>
    <x-slot name="header">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Country') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Add Country</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('country.index')}}" class="btn btn-sm btn-primary">View List</a>
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
				<form action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<label>Name : </label>
					<input type="text" name="name" id="" value="{{old('name')}}" class="form-control">
					<br/>
					<label>Country Code : </label>
					<input type="text" name="country_code" id="" value="{{old('country_code')}}" class="form-control">
					<br/>
					<label>Flag : </label>
					<input type="file" name="flag" id="" value="{{old('flag')}}" class="form-control">
					<br/>
					<button type="submit" class="btn btn-success btn-block">Save</button>
				</form>
            </div>
        </div>
    </div>
</x-app-layout>
