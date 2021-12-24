<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Apply Job</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            p{
				font-size: 15px;
				line-height: 25px;
			}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Tech Blog</a>
				</div>
				<ul class="nav navbar-nav">
					@if (Route::has('login'))
					@auth
					<li>
						<a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
					</li>
					<li>
						<a href="{{ url('/job_apply') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Apply Job</a>
					</li>
					<li>
						<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
					</li>
					@else
						<li>
							<a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
						</li>
						@if (Route::has('register'))
						<li>
							<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
						</li>
						@endif
					@endauth
					@endif
				</ul>
			</div>
		</nav>

		<div class="container-fluid" style="margin: 0% 5%;">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h3>Enroll your details</h3>
				</div>
			</div>
			<br/><br/>
			<div class="row">
				<div class="col-sm-12">
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
						<button type="submit" class="btn btn-success btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
    </body>
</html>
