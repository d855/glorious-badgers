<x-layout>
	<h2>Edit post - {{ $post->title }}</h2>

	<form action="{{ route('posts.update', $post->id) }}" method="post">
		@csrf
		@method('PATCH')

		<div>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ $post->title }}">
		</div>

		<div>
			<label for="body">Text</label>
			<textarea name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
		</div>

		<div>
			<label for="category">Category</label>
			<select name="category_id" id="category">
				@foreach($categories as $cateogry)
					<option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<input type="submit" class="submit-btn" value="Update">
		</div>
	</form>
</x-layout>