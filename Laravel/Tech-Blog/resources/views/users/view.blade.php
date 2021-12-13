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
                        <h3><strong>Users List</strong></h3>
                    </div>
                </div>
				<br/>
                <div class="row">
                    <div class="col-sm-6">
						<h5><strong>Existing Users</strong></h5>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
								@foreach($existingUsers as $existingUser)
								<tr>
									<td>{{$existingUser['name']}}</td>
									<td>{{$existingUser['email']}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<br/>
						<h5><strong>Existing Emails</strong></h5>
						{{$existingMails}}
                    </div>
					<div class="col-sm-6">
						<h5><strong>New Users</strong></h5>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
								@foreach($newUserDetails as $newUserDetail)
								<tr>
									<td>{{$newUserDetail['name']}}</td>
									<td>{{$newUserDetail['email']}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
