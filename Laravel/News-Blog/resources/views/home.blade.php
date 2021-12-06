<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>News Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            
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
					<a class="navbar-brand" href="#">News Blog</a>
				</div>
				<ul class="nav navbar-nav">
					@if (Route::has('login'))
					@auth
					<li class="active">
						<a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
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

		<div class="container-fluid" style="margin-top: 50px;">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2>Welcome to laravel news section!</h2>
				</div>
			</div>
			<br/>
			<br/>
			@if($posts)
			<div class="row">
				@foreach($posts as $post)
				<a href="{{ route('show',$post->id) }}">
					<div class="col-sm-4 card">
						<img class="card-img-top" src="images/post/{{$post->image}}" style="width: 100%;" alt="Card image">
						<div class="card-body">
							<h4 class="card-title">{{$post->title}}</h4>
						</div>
					</div>
				</a>
				@endforeach
			</div>
			@endif
		</div>
    </body>
</html>
