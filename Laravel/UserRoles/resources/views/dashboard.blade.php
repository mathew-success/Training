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
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('role.create') }}" class="btn btn-block btn-info">Create User Roles</a>
                        <br/>
                        <a href="{{ route('assign-role.create') }}" class="btn btn-block btn-info">Assign roles to the user</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
