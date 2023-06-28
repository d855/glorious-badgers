<x-layout>
	<h2>Create new Post</h2>

	<div class="form-wrapper">
		<form action="{{ route('posts.store') }}" method="POST">
			@csrf

			<label for="title">Title</label>
			<input type="text" id="title" name="title" placeholder="Post title">
			@error('title')
			<div class="alert-danger">{{$message}}</div>
			@enderror

			<label for="author">Author</label>
			<select name="author_id" id="author">
				<option value="" selected>Choose author</option>
				@foreach($authors as $author)
					<option value="{{ $author->id }}">{{ $author->full_name }}</option>
				@endforeach
			</select>
			@error('author_id')
			<div class="alert-danger">{{$message}}</div>
			@enderror

			<label for="category">Category</label>
			<select name="category_id" id="category">
				<option value="" selected>Choose category</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			@error('category_id')
			<div class="alert-danger">{{$message}}</div>
			@enderror

			<label for="body">Post body</label>
			<textarea name="body" id="body" cols="30" rows="10"></textarea>
			@error('body')
			<div class="alert-danger">{{$message}}</div>
			@enderror

			<input type="submit" value="Submit">
		</form>
	</div>
</x-layout>