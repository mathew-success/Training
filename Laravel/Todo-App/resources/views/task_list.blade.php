<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
					<div class="col-sm-10">
						<h3>Task list</h3>
					</div>
					<div class="col-sm-2 text-right">
						<a href="{{route('dashboard')}}" class="btn-sm btn-primary">Back to Home</a>
					</div>
				</div>
				<br/>
                <table class="table table-bordered">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Task Name</th>
							<th>Assignee</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tasks as $task)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $task->name }}</td>
							<td>{{ $task->assignee }}</td>
							<td><a href="{{route('destroy',$task->id)}}">Delete</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
            </div>
        </div>
    </div>
</x-app-layout>
