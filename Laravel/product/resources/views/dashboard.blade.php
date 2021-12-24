<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h3>Product Management</h3>
                    </div>
                </div>
                <hr/>
                <div class="row border-bottom">
                    <div class="col-sm-4 border-right">
                        <h5 class="text-center">Users</h5>
                        @can('userCreate', 'App\Models\RolePermission')
                        <a href="{{ route('user.create') }}" class="btn btn-block btn-info">Create Users</a>
                        @endcan
                        <br/>
                        @can('userList', 'App\Models\RolePermission')
                        <a href="{{ route('user.index') }}" class="btn btn-block btn-info">Users List</a>
                        @endcan
                        <br/>
                    </div>
                    @can('rolecreate', 'App\Models\RolePermission')
                    <div class="col-sm-4 border-right">
                        <h5 class="text-center">Roles</h5>
                        <a href="{{ route('assign-role.create') }}" class="btn btn-block btn-info">Create Roles</a>
                        <br/>
                        <a href="{{ route('assign-role.index') }}" class="btn btn-block btn-info">Roles List</a>
                        <br/>
                    </div>
                    @endcan
                    @can('organization', 'App\Models\RolePermission')
                    <div class="col-sm-4 border-right">
                        <h5 class="text-center">Organizations</h5>
                        @can('organizationCreate', 'App\Models\RolePermission')
                        <a href="{{ route('organization.create') }}" class="btn btn-block btn-info">Create Organization</a>
                        @endcan
                        <br/>
                        @can('organizationList', 'App\Models\RolePermission')
                        <a href="{{ route('organization.index') }}" class="btn btn-block btn-info">Organizations List</a>
                        @endcan
                        <br/>
                    </div>
                    @endcan
                </div>
                <br/>
            </div>
        </div>
    </div>
</x-app-layout>
