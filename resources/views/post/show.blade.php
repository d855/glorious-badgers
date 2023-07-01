<x-layout>
	<h2>{{ $post->title }}</h2>
	<span>Author: {{ $post->author->full_name }}</span>
	<div>Date: {{ $post->created_at->diffForHumans() }}</div>
	<p>{{ $post->body }}</p>


	<div class="new-comment">
		<form action="{{ route('posts.comments.store', $post->id) }}" method="post">
			@csrf

			<label for="comment">Comment</label>
			<input type="text" name="body" id="comment" placeholder="Write a comment..">

			<input type="submit" value="Add Comment">
		</form>
	</div>

	<div class="all-comments">
		@if(count($post->comments) > 0)
			<h2>All Comments</h2>
			@foreach($post->comments as $comment)
				<div>
					<p>{{ $comment->body }} - {{ $comment->created_at->diffForHumans() }}</p>
				</div>
			@endforeach
		@endif
	</div>
</x-layout>