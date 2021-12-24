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
                    <div class="col-sm-12 text-left">
                        <h3>Workspaces</h3>
                    </div>
                </div>
                <br/><br/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Workspace</th>
                            <th>Projects Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workspaces as $workspace)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $workspace->name }}</td>
                                <td>{{ $workspace->projects_count }}</td>
                                <td>
                                    <a href="{{ route('workspace.show',$workspace->id) }}" class="btn btn-sm btn-primary">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
