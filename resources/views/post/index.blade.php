<x-layout>
	<h1>All Posts</h1>

	<div>
		<table>
			<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Cateogry</th>
				<th>Date</th>
			</tr>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<td>{{ $post->title }}</td>
					<td>{{ $post->author->full_name }}</td>
					<td>{{ $post->category->name }}</td>
					<td>{{ $post->created_at->diffForHumans() }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</x-layout>