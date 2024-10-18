@extends('layout')

@section('title', 'Posts')

@section('content')
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Posts</h2>

    @if(session('success'))
        <p class="bg-green-100 text-green-800 p-3 rounded-lg mb-6">{{ session('success') }}</p>
    @endif

    {{-- Search Form --}}
    <form action="{{ route('posts.index') }}" method="GET" class="mb-8">
        <div class="flex items-center">
            <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}"
                   class="border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-peach-300 focus:border-peach-400">
            <button type="submit" class="bg-peach-500 text-white px-6 py-2 ml-4 rounded-lg hover:bg-peach-400 transition duration-200">
                Search
            </button>
        </div>
    </form>

    {{-- Conditionally Hide Create Post Form if Search is Active --}}
    @if(!request('search'))
        {{-- Create Post Form --}}
        <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg mb-10">
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
    @endif

    {{-- Display Posts --}}

    <ul class="space-y-4 mt-6">
        @if($posts->isEmpty())
            <p class="text-red-600">
                @if(request('search'))
                    No posts found for: "<strong>{{ request('search') }}</strong>"
                @else
                    No posts available.
                @endif
            </p>
        @else
            @foreach($posts as $post)
                <li class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-peach-600 font-semibold hover:text-peach-500">{{ $post->title }}</a>
                </li>
            @endforeach

            <li class="mt-4">
                <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-mint-400 transition duration-200 font-semibold shadow-md">
                  Go Back
                </a>
            </li>

        @endif
    </ul>
@endsection
