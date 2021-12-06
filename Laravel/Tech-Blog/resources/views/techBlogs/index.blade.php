<x-app-layout>
    <x-slot name="header">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Technologies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Blog Technologies</h3>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('blog_tech.create')}}" class="btn btn-sm btn-primary">Add Blog Techs</a>
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
							<th>Blog</th>
							<th>Technology</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($blogs)
							@foreach($blogs as $blog)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$blog->blogs->title}}</td>
								<td>{{$blog->technology->name}}</td>
								<td><a href="{{route('blog_tech.destroy',$blog->id)}}">Delete</a></td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
            </div>
        </div>
    </div>
</x-app-layout>
