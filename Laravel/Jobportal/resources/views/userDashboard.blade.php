@extends('layouts.user.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
            <h4>User Dashboard</h4>
            <div class="row">
                <div class="col-sm-3">
                    <a href="{{route('user.jobs')}}" class="btn btn-block btn-default">Jobs List</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('user.appliedjobs')}}" class="btn btn-block btn-default">Applied Jobs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection