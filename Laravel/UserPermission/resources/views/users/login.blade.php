<x-guest-layout>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.login') }}">
            @csrf
			<div class="row">
				<div class="col-sm-12">
					<label>Email : </label>
					<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="">
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-sm-12">
					<label>Password : </label>
					<input type="password" name="password" class="form-control" id="">
				</div>
			</div>
			<br/>
			<button type="submit" class="btn btn-success">Login</button>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
