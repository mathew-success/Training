<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tech Blog</title>

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
					<h3>View the blog and technlogy</h3>
				</div>
			</div>
			<br/><br/>
			<div class="row">
				<div class="col-sm-6 text-left" style="border-right: 1px dashed #333;">
					<img src="{{asset('/images/blog/' . $blog->blogs->image)}}" style="width: 70%;" alt="Blog image" />
					<h3>{{$blog->blogs->title}}</h3>
					<p class="text-justify">{{ $blog->blogs->description }}</p>
				</div>
				<div class="col-sm-6 text-left">
				<img src="{{asset('/images/technology/' . $blog->technology->image)}}" style="width: 70%;" alt="Tech image" />
					<h3>{{$blog->technology->name}}</h3>
					<p class="text-justify">{{ $blog->technology->description }}</p>
				</div>
			</div>
			<br/><br/>
			<div class="row">
				<div class="col-sm-12 text-center">
					<a href="{{route('job.apply')}}" class="btn btn-info">Apply Now</a>
				</div>
			</div>
			<br/><br/>
		</div>
    </body>
</html>
