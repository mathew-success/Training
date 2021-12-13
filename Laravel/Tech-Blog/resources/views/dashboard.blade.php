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
                    <div class="col-sm-12 text-center">
                        <h3>Welcome to the Blog</h3>
                    </div>
                </div>
                <br/>
                <!-- <div class="row">
                    <div class="col-sm-6">
                        <ul>
                            <li><a href="{{route('blog.create')}}" class="btn btn-primary btn-block">Create Blog</a></li>
                            <br/>
                            <li><a href="{{route('technology.create')}}" class="btn btn-primary btn-block">Create Technology</a></li>
                            <br/>
                            <li><a href="{{route('blog_tech.create')}}" class="btn btn-primary btn-block">Associate Blog & Technologies</a></li>
                            <br/>
                            <li><a href="{{route('country.create')}}" class="btn btn-primary btn-block">Create Country</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul>
                            <li><a href="{{route('job.create')}}" class="btn btn-primary btn-block">Add Jobs</a></li>
                            <br/>
                            <li><a href="{{route('job_tech.create')}}" class="btn btn-primary btn-block">Associate Job and Technology</a></li>
                            <br/>
                            <li><a href="{{route('job_enquiry.create')}}" class="btn btn-primary btn-block">Job Enquiry</a></li>
                        </ul>
                    </div>
                </div>-->
                <br/>
                <div class="row">
                    <div class="col-sm-6">
                        <ul>
                            <li><a href="{{route('user.create')}}" class="btn btn-primary btn-block">Create Users</a></li>
                            <br/>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
