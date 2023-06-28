<x-layout>
	<h2>{{ $post->title }}</h2>
	<span>Author: {{ $post->author->full_name }}</span>
	<div>Date: {{ $post->created_at->diffForHumans() }}</div>
	<p>{{ $post->body }}</p>
</x-layout>