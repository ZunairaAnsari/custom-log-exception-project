@extends('layout')

@section('title', 'Register')

@section('content')
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Register</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif
    
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('register') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-peach-300 focus:border-peach-400" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-peach-300 focus:border-peach-400" required>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-peach-300 focus:border-peach-400" required>
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Password_confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-peach-300 focus:border-peach-400" required>
            @error('password_confirmation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Profile Image</label>
            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-peach-300 focus:border-peach-400">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-peach-500 text-white px-6 py-2 rounded-lg hover:bg-peach-400 transition duration-200">Register</button>
        
        <p class="mt-4 text-sm text-gray-600 text-center">
            Already have an account? <a href="{{ route('login') }}" class="text-peach-500 hover:text-peach-600">Login here</a>
        </p>
    </form>
@endsection
