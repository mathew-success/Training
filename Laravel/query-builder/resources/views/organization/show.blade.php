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
                        <h3 class="text-left">Organization Details</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{ route('organization.index') }}" class="btn btn-sm btn-primary text-right">Back to List</a>
                    </div>
                </div>
                <br/><br/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">Organization Name : {{ $organization->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>No.of Workspaces : </strong>{{ $organization->workspaces_count }}</td>
                            <td><strong>No.of Projects : </strong>{{ $organization->projects_count }}</td>
                            <td><strong>No.of Roles :</strong> {{ $organization->roles_count }}</td>
                            <td><strong>No.of Users :</strong> {{ $organization->users_count }}</td>
                        </tr>
                        <tr>
                            <th colspan="4">Projects with Tasks</th>
                        </tr>
                        <tr>
                            <th>Project Name</th>
                            <th colspan="3">No.of Tasks</th>
                        </tr>
                        @foreach($projects as $project)
                            @if($project->tasks_count)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td colspan="3">{{ $project->tasks_count }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
