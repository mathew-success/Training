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
                        <h3>Permissions</h3>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    @if(!empty($userPermission) && in_array('Create', $userPermission))
                    <div class="col-sm-3" style="margin-bottom: 25px;">
                        <label class="btn btn-success">Create</label>
                    </div>
                    @endif
                    @if(!empty($userPermission) && in_array('View', $userPermission))
                    <div class="col-sm-3" style="margin-bottom: 25px;">
                        <label class="btn btn-success">View</label>
                    </div>
                    @endif
                    @if(!empty($userPermission) && in_array('Store', $userPermission))
                    <div class="col-sm-3" style="margin-bottom: 25px;">
                        <label class="btn btn-success">Store</label>
                    </div>
                    @endif
                    @if(!empty($userPermission) && in_array('Edit', $userPermission))
                    <div class="col-sm-3" style="margin-bottom: 25px;">
                        <label class="btn btn-success">Edit</label>
                    </div>
                    @endif
                    @if(!empty($userPermission) && in_array('Show', $userPermission))
                    <div class="col-sm-3" style="margin-bottom: 25px;">
                        <label class="btn btn-success">Show</label>
                    </div>
                    @endif
                    @if(!empty($userPermission) && in_array('Delete', $userPermission))
                    <div class="col-sm-3" style="margin-bottom: 25px;">
                        <label class="btn btn-success">Delete</label>
                    </div>
                    @endif
                </div>
                @if(empty($userPermission))
                    <div class="alert alert-warning">
                        Permission not defined !
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
