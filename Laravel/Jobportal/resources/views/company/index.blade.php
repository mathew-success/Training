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
                        <h3>Company</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('company.create')}}" class="btn btn-sm btn-primary">Add companies</a>
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
							<th>Company Name</th>
							<th>Location</th>
							<th>Website</th>
							<th>Employer Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($companies)
							@foreach($companies as $company)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$company->company->company_name}}</td>
								<td>{{$company->company->location}}</td>
								<td>{{$company->company->website}}</td>
								<td>{{$company->employer->name}}</td>
								<td>{{$company->employer->email}}</td>
								<td>{{$company->employer->phone_no}}</td>
								<td><a href="{{route('company.destroy',$company->id)}}">Delete</a></td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
            </div>
        </div>
    </div>
</x-app-layout>
