<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
                <div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>News List</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{route('dashboard')}}" class="btn-primary btn-sm">Add Post</a>
                    </div>
                </div>
                <br/>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Title</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($posts)
							@foreach($posts as $post)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$post->title}}</td>
								<td><img src="images/post/{{$post->image}}" width="300"/></td>
								<td><a href="{{route('delete',$post->id)}}">Delete</a></td>
							</tr>
							@endforeach
						@endif
						@unless($posts)
						<tr>
							<td colspan="4">No data found</td>
						</tr>
						@endunless
					</tbody>
				</table>
            </div>
        </div>
    </div>
</x-app-layout>
