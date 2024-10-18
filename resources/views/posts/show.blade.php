@extends('layout')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg max-w-xl mx-auto">
        <div class="flex items-center mb-6">
            {{-- User Image --}}
            @if($post->user->image)
                <img src="{{ asset('storage/' . $post->user->image) }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full object-cover mr-4">
            @else
                <img src="{{ asset('images/default-user.png') }}" alt="Default User" class="w-12 h-12 rounded-full object-cover mr-4">
            @endif
        
            {{-- User Name and Post Date --}}
            <div>
                <p class="text-gray-800 font-semibold">{{ $post->user->name }}</p>
                <p class="text-gray-500 text-sm">Posted on {{ $post->created_at->format('F j, Y') }}</p>
            </div>
        </div>
        {{-- Post Title --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

        {{-- Post Content --}}
        <p class="text-gray-700 mb-6">{{ $post->content }}</p>

        {{-- User Info --}}

        {{-- Back to Posts Button --}}
        <a href="{{ route('posts.index') }}" class="bg-peach-500 text-white px-4 py-2 rounded-lg hover:bg-peach-400 transition duration-200">
            Back to Posts
        </a>
    </div>
@endsection

 
