@extends('layout')

@section('title', 'Posts')

@section('content')
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Posts</h2>

    @if(session('success'))
        <p class="bg-green-100 text-green-800 p-3 rounded-lg mb-6">{{ session('success') }}</p>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
        @csrf
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-peach-300 focus:border-peach-400" required>
        </div>

        <div class="mb-6">
            <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
            <textarea name="content" id="content" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-peach-300 focus:border-peach-400" rows="5" required></textarea>
        </div>

        <button type="submit" class="bg-peach-500 text-white px-6 py-2 rounded-lg hover:bg-peach-400 transition duration-200">Create Post</button>
    </form>

    <h3 class="text-xl font-semibold text-gray-800 mt-10">All Posts</h3>
    <ul class="space-y-4 mt-6">
        @foreach($posts as $post)
            <li class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <a href="{{ route('posts.show', $post->id) }}" class="text-peach-600 font-semibold hover:text-peach-500">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
