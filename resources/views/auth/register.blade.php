<x-layout>
	<h3>Register</h3>

	@if($errors->any())
		<div class="alert-danger">
			<div>Something went wrong!</div>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{ route('register.store') }}" method="POST">
		@csrf

		<div>
			<label for="first_name">First name</label>
			<input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}">
		</div>

		<div>
			<label for="last_name">Last name</label>
			<input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}">
		</div>

		<div>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" value="{{ old('email') }}">
		</div>

		<div>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
		</div>

		<div>
			<label for="password_confirmation">Confirm password</label>
			<input type="password" name="password_confirmation" id="password_confirmation">
		</div>

		<div>
			<input type="submit" value="Register" class="submit-btn">
			<p>Allready have an account? <a href="{{ route('login') }}">Login here</a></p>
		</div>
	</form>
</x-layout>