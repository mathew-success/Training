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
                        <h3>Users List</h3>
                    </div>
                </div>
                <br/>
				<form action="{{route('user.store')}}" method="POST">
					@csrf
					<button type="submit" class="btn btn-success">Save</button>
				</form>
                <div class="row">
                    <div class="col-sm-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
