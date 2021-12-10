@extends('layouts.employer.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
            <h4>Employers Dashboard</h4>
            <div class="row">
                <div class="col-sm-3">
                    <a href="{{route('job.index')}}" class="btn btn-block btn-default">Jobs List</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('job.create')}}" class="btn btn-block btn-default">Create a new job</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('job.users')}}" class="btn btn-block btn-default">Applied users list</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection