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
                        <h3>Organizations</h3>
                    </div>
                </div>
                <br/><br/>
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
                            <th>Name</th>
                            <th>Workspaces Count</th>
                            <th>Projects Count</th>
                            <th>Roles Count</th>
                            <th>Users Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizations as $organization)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $organization->name }}</td>
                                <td>{{ $organization->workspaces_count }}</td>
                                <td>{{ $organization->projects_count }}</td>
                                <td>{{ $organization->roles_count }}</td>
                                <td>{{ $organization->users_count }}</td>
                                <td>
                                    <a href="{{ route('organization.show',$organization->id) }}" class="btn btn-sm btn-primary">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
