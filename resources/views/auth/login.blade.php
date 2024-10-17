@extends('layout')

@section('title', 'Login')

@section('content')
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Login</h2>

    @if(session('success'))
        <p class="bg-green-100 text-green-800 p-3 rounded-lg mb-6">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
        @csrf

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

        <button type="submit" class="bg-peach-500 text-white px-6 py-2 rounded-lg hover:bg-peach-400 transition duration-200">Login</button>
    </form>

     <p class="mt-4 text-sm text-gray-600 text-center">
            Don't have an account? <a href="{{ route('register') }}" class="text-peach-500 hover:text-peach-600">Register here</a>
        </p>
@endsection
