<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="text-left">Project Details</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{ route('project.index') }}" class="btn btn-sm btn-primary text-right">Back to List</a>
                    </div>
                </div>
                <br/><br/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Project Name : {{ $project->name }}</th>
                            <th>Organization Name : {{ $project->organization->name }}</th>
                            <th>Workspace Name : {{ $project->workspace->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="3">Task Name</th>
                        </tr>
                        @foreach($tasks as $task)
                        <tr>
                            <td colspan="3">{{ $task->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
