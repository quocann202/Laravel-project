@extends('homepage')
@section('title', 'Register')
@section('content')

    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error message --}}
            @if (session('error'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{route('register.post')}}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block mb-1 font-medium">Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-1 font-medium">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-1 font-medium">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                    Register
                </button>
            </form>

            <p class="mt-4 text-sm text-center">
                Already have an account?
                <a href={{route('login')}} class="text-blue-600 hover:underline">Log in here</a>
            </p>
        </div>
    </div>
@endsection