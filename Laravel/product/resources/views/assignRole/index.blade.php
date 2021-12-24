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
                    <div class="col-sm-10 text-left">
                        <h3>Roles and Permissions list</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{ route('assign-role.create') }}" class="btn btn-sm btn-primary">Create Role</a>
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
                            <th>Role Names</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->permissions->pluck('name')->implode(', ') }}</td>
                                <td>
                                    <a href="{{ route('assign-role.edit',$role->id) }}" class="btn btn-primary">Edit</a>
                                    &nbsp;
                                    <a href="{{ route('assign-role.delete',$role->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
