@extends('layout')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700 mb-6">{{ $post->content }}</p>
        <a href="{{ route('posts.index') }}" class="bg-peach-500 text-white px-4 py-2 rounded-lg hover:bg-peach-400 transition duration-200">Back to Posts</a>
    </div>
@endsection
 
