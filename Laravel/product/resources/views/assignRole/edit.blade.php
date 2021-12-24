<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
                <div class="row">
                    <div class="col-sm-10 text-left">
                        <h3>Roles list</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{ route('assign-role.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                    </div>
                </div>
                <br/><br/>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('message') }}
                    </div>
				@endif
                <form action="{{ route('assign-role.update',$role->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-sm-6">
                            <label><strong>Role Name : </strong></label>
                            <input type="text" name="role_name" value="{{ $role->name }}" class="form-control" id="">
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-8">
                        <label><strong>Permissions : </strong></label>
                            @foreach($permissions as $key=>$permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check{{ $permission->id }}" name="permission_id[]" value="{{ $permission->id }}" {{ in_array($permission->name,$assigned_permissions) ? 'checked':''}}>
                                    <label class="form-check-label" for="check{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
