<x-layout>
	<h3>Login</h3>

	<form action="{{ route('login.store') }}" method="POST">
		@csrf

		<div>
			<label for="email">Email</label>
			<input type="email" id="email" name="email">
		</div>

		<div>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
		</div>

		<div>
			<input type="submit" value="Login" class="submit-btn">
			<p>No account? <a href="{{ route('register') }}">Register here</a></p>
		</div>
	</form>
</x-layout>