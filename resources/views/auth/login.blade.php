@extends('auth.layout')

@section('title', 'Login')

@section('content')
    <div class="w-full h-full flex justify-between">
        <div class="w-1/3 h-full flex flex-col items-center justify-center bg-sky-400">
            <p class="text-xl">Image</p>
        </div>
        <div class="w-2/3 h-full flex flex-col items-center justify-center bg-sky-50">
            <h1 class="text-4xl font-medium mb-5">Login</h1>
            <form method="post" action="{{ route('login') }}" class="flex flex-col items-center gap-2">
                @csrf
                <input placeholder="Email" type="email" name="email" class="border p-2">
                @include('auth.components.input_error', ['error' => 'email'])
                <input placeholder="Password" type="password" name="password" class="border p-2">
                @include('auth.components.input_error', ['error' => 'password'])
                <button class="border w-1/2 p-1 rounded bg-sky-300 hover:bg-sky-200 transition">Login</button>
            </form>
            <a href="/register" class="hover:underline mt-2">Don't have an account? Register here!</a>
        </div>
    </div>
@endsection
