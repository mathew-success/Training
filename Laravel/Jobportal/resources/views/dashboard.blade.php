<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
                <br/>
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{route('company.create')}}" class="btn btn-primary btn-block">Company</a>
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </div>
</x-app-layout>
