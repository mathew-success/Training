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
                        <h3 class="text-left">User Details</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary text-right">Back to List</a>
                    </div>
                </div>
                <br/><br/>
                <table class="table table-bordered border border-secondary">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>User Name : {{ $user->name }}</th>
                            <th>Organization Name : {{ $user->organization->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-secondary text-white">
                            <th colspan="2">Workspace</th>
                        </tr>
                        @foreach($user->organization->workspaces as $workspace)
                        <tr>
                            <td colspan="2">{{ $workspace->name }}</td>
                        </tr>
                        @endforeach
                        <tr class="bg-secondary text-white">
                            <th colspan="2">Roles</th>
                        </tr>
                        @foreach($user->roles as $role)
                        <tr>
                            <td colspan="2">{{ $role->name }}</td>
                        </tr>
                        @endforeach
                        <tr class="bg-secondary text-white">
                            <th colspan="2">Projects</th>
                        </tr>
                        @foreach($user->projectUsers as $project)
                        <tr>
                            <td colspan="2"><strong>Project Name :</strong> {{ $project->name }}</td>
                            @foreach($project->tasks as $task)
                            <tr>
                                <td colspan="2"><strong>Task Name :</strong> {{ $task->name }}</td>
                            </tr>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
