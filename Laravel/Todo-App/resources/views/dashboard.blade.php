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
                        <h3>Task</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{route('tasks')}}" class="btn-sm btn-primary">View Tasks</a>
                    </div>
                </div>
                <br/>
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}<br/>
                    @endforeach
                </div>
                @endif
                <form action="/task" method="POST">
                    @csrf
                    <label>Enter the Task</label>
                    <input type="text" name="name" id="" value="{{old('name')}}" class="form-control">
                    <br/>
                    <label>Enter Assignee Name</label>
                    <input type="text" name="assignee" id="" value="{{old('assignee')}}" class="form-control">
                    <br/>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
