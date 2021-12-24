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
                <h3 class="text-center">Welcome to user management</h3>
                <br/><br/>
                @can('isSuperAdmin')
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{ route('user.create') }}" class="btn btn-block btn-info">Create Users</a>
                        <br/>
                        <a href="{{ route('user.index') }}" class="btn btn-block btn-info">Users List</a>
                        <br/>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{ route('assign-permission.create') }}" class="btn btn-block btn-info">Create role with permission</a>
                        <br/>
                        <a href="{{ route('role.index') }}" class="btn btn-block btn-info">Roles List</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{ route('assign-role.create') }}" class="btn btn-block btn-info">Assign role</a>
                        <br/>
                        <a href="{{ route('assign-role.index') }}" class="btn btn-block btn-info">Assigned users list with role</a>
                        <br/>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{ route('assign-permission.index') }}" class="btn btn-block btn-info">Assigned Permission List</a>
                    </div>
                </div>
                @endcan
                
                @can('isAdmin')
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{ route('user.create') }}" class="btn btn-block btn-info">Create Users</a>
                        <br/>
                        <a href="{{ route('user.index') }}" class="btn btn-block btn-info">Users List</a>
                        <br/>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
