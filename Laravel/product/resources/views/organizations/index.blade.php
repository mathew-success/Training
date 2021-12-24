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
                    <div class="col-sm-8 text-left">
                        <h3>Organization List</h3>
                    </div>
                    <div class="col-sm-4 text-right">
                    @can('organizationCreate', 'App\Models\RolePermission')
                        <a href="{{ route('organization.create') }}" class="btn btn-sm btn-primary">Create Organization</a>
                    @endcan
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
                            <th>Organization Name</th>
                            <th>Organization Admin</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizations as $organization)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $organization->name }}</td>
                                <td>{{ $organization->user->name }}</td>
                                <td>{{ $organization->user->email }}</td>
                                <td>{{ $organization->user->phone_no }}</td>
                                <td>
                                    <a href="{{ route('organization.edit', $organization->id) }}" class="btn btn-sm btn-primary">Edit</a>&nbsp;
                                    <a href="{{ route('organization.delete', $organization->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
