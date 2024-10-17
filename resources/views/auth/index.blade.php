@extends('layout')

@section('content')

 <h2 class="text-3xl font-bold text-gray-800 mb-8">Registered Users</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-3 px-4 border-b text-left text-gray-600">Image</th>
                    <th class="py-3 px-4 border-b text-left text-gray-600">Name</th>
                    <th class="py-3 px-4 border-b text-left text-gray-600">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4 border-b">
                            <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="w-10 h-10 rounded-full">
                        </td>
                        <td class="py-3 px-4 border-b text-gray-800">{{ $user->name }}</td>
                        <td class="py-3 px-4 border-b text-gray-800">{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection