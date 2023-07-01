<x-layout>
	<div>
		<h1>All Posts</h1>
		<x-button href="{{ route('posts.create') }}">New post</x-button>
	</div>
	<div>
		<table>
			<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Cateogry</th>
				<th>Date</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<td>
						<a href="{{ route('posts.show', $post->id) }}">
							{{ $post->title }}
						</a>
					</td>
					<td>{{ $post->author->full_name }}</td>
					<td>{{ $post->category->name }}</td>
					<td>{{ $post->created_at->diffForHumans() }}</td>
					<td><a href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
					<td>
						<form action="{{ route('posts.destroy', $post->id) }}" method="post">
							@csrf
							@method('DELETE')
							<input type="submit" class="delete-btn" value="Delete">
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</x-layout>