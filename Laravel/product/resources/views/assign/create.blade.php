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
                    <div class="col-sm-10">
                        <h3 class="text-left">Create role and permissions</h3>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('assign-permission.index') }}" class="btn btn-sm btn-primary text-right">Assigned List</a>
                    </div>
                </div>
                <br/><br/>
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}.<br/>
                    @endforeach
                </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('message') }}
                    </div>
				@endif
                <form action="{{ route('assign-permission.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label><strong>User : </strong></label>
                            <select name="user_id" class="form-control">
                                <option value="">Select--</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label><strong>Role : </strong></label>
                            <select name="role_id" class="form-control">
                                <option value="">Select--</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-8">
                        <label><strong>Permissions : </strong></label>
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check{{ $permission->id }}" name="permission_id[]" value="{{ $permission->id }}">
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
