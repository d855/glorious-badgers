{{--

--}}
		<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
		      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Contact</title>
		{{--
		 By default Laravel utilizes Vite to bundle your assets. Vite provides lightning-fast
		 build times and near instantaneous Hot Module Replacement (HMR) during local dev.
		--}}
		@vite(['resources/css/app.css'])
	</head>
	<body>
		<nav class="topnav">
			<a href="{{ route('home') }}">Home</a>
			<a href="{{ route('posts.index') }}">Posts</a>
			<a href="{{ route('about') }}">About</a>
			<a href="{{ route('contact') }}">Contact</a>
		</nav>

		<div class="container">
			<main>
				{{ $slot }}
			</main>
		</div>
	</body>
</html>