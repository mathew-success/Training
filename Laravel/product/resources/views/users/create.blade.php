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
                        <h3 class="text-left">Create Users</h3>
                    </div>
                    <div class="col-sm-2">
                    @can('userList', 'App\Models\RolePermission')
                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary text-right">Users List</a>
                    @endcan
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
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label>User name : </label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label>Email : </label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="">
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Phone Number : </label>
                            <input type="text" name="phone_no" value="{{ old('phone_no') }}" class="form-control" id="">
                        </div>
                        <div class="col-sm-4">
                            <label>Password : </label>
                            <input type="password" name="password" class="form-control" id="">
                        </div>
                        <div class="col-sm-4">
                            <label>Role : </label>
                            <select name="role_id" class="form-control">
                                <option value="">Select--</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
