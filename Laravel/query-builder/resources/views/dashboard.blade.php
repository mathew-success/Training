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
                    <div class="col-sm-12 text-center">
                        <h3>Project Query Builder</h3>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <a href="{{ route('organization.index') }}" class="btn btn-block btn-info">Organizations</a>
                        <br/>
                        <a href="{{ route('workspace.index') }}" class="btn btn-block btn-info">Workspaces</a>
                        <br/>
                        <a href="{{ route('role.index') }}" class="btn btn-block btn-info">Roles</a>
                        <br/>
                    </div>
                    <div class="col-sm-6 border-right">
                        <a href="{{ route('project.index') }}" class="btn btn-block btn-info">Projects</a>
                        <br/>
                        <a href="{{ route('task.index') }}" class="btn btn-block btn-info">Tasks</a>
                        <br/>
                        <a href="{{ route('users.index') }}" class="btn btn-block btn-info">Users</a>
                        <br/>
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </div>
</x-app-layout>
