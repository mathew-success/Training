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
                        <h3 class="text-left">Workspace Details</h3>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('workspace.index') }}" class="btn btn-sm btn-primary text-right">Back to List</a>
                    </div>
                </div>
                <br/><br/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Workspace Name : {{ $workspace->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Project Name</th>
                            <th>Task Count</th>
                        </tr>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->tasks_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
