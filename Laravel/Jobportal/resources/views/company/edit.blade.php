<x-app-layout>
    <x-slot name="header">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h4>Update company details</h4>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('company.index')}}" class="btn btn-sm btn-primary">View List</a>
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
				<form action="{{route('company.update', $company->id)}}" method="POST">
				@csrf
				@method('PATCH')
					<div class="row">
						<div class="col-sm-4">
							<label>Company Name : </label>
							<input type="text" name="company_name" id="" value="{{$company->company->company_name}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Location : </label>
							<input type="text" name="location" id="" value="{{$company->company->location}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Website : </label>
							<input type="text" name="website" id="" value="{{$company->company->website}}" class="form-control">
							<br/>
						</div>
					</div>
							
					<h4 class="text-left">Add Employer Details :</h4>
					<hr/>
					<div class="row">
						<div class="col-sm-4">
							<label>Employer Name : </label>
							<input type="text" name="name" id="" value="{{$company->employer->name}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Email : </label>
							<input type="text" name="email" id="" value="{{$company->employer->email}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Phone number : </label>
							<input type="text" name="phone_no" id="" value="{{$company->employer->email}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Password : </label>
							<input type="password" name="password" id="" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Confirm Password : </label>
							<input type="password" name="password_confirmation" id="" class="form-control">
							<br/>
						</div>
					</div>
					<button type="submit" class="btn btn-success btn-block">Save</button>
				</form>
            </div>
        </div>
    </div>
</x-app-layout>
