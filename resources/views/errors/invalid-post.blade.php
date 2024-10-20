{{-- 
<body class="bg-gradient-to-r from-white to-gray-100 min-h-screen flex flex-col justify-center items-center text-center p-6"> --}}

    {{-- <div class="bg-error rounded-lg shadow-lg p-8 max-w-md mx-auto">
        <h1 class="text-3xl font-bold text-error mb-4">An Error Occurred!</h1>
        <p class="text-gray-700 mb-6">We're sorry, but something went wrong with your request.</p>
        <a href="{{ route('posts.index') }}" class="bg-peach-500 text-gray-700 px-4 py-2 rounded-lg hover:bg-peach-400 transition duration-200">Go back to Posts</a>
    </div> --}}

@extends('layout')

@section('title', 'Error')

@section('content')
    <div class="text-center mt-10">
        <h1 class="text-3xl font-bold text-red-600 mb-4">Error</h1>
        <p class="text-lg text-gray-600 mb-6">{{ $message }}</p>  {{-- Use $message instead of $exception --}}
        <a href="{{ route('posts.index') }}" class="bg-mint-500 text-white px-6 py-2 rounded-lg hover:bg-mint-400 transition duration-200">
            Go Back to Posts
        </a>
    </div>

    <style>
        /* Custom styles (optional) */
        .bg-error { background-color: #ffe4e1; }
        .text-error { color: #ff4d4d; }
    </style>
@endsection


