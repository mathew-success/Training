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
                        <h3 class="text-left">Update Organization</h3>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('organization.index') }}" class="btn btn-sm btn-primary text-right">Organization List</a>
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
                <form action="{{ route('organization.update',$organization->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Organization name : </label>
                            <input type="text" name="org_name" value="{{ $organization->name }}" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label>User name : </label>
                            <input type="text" name="name" value="{{ $organization->user->name }}" class="form-control" id="">
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Email : </label>
                            <input type="text" name="email" value="{{ $organization->user->email }}" class="form-control" id="">
                        </div>
                        <div class="col-sm-4">
                            <label>Phone Number : </label>
                            <input type="text" name="phone_no" value="{{ $organization->user->phone_no }}" class="form-control" id="">
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Assign Role : </label>
                            <select name="role_id" class="form-control">
                                <option value="">Select--</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{$role->id == $actualRole->role_id ? 'selected':''}}>{{ $role->name }}</option>
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
