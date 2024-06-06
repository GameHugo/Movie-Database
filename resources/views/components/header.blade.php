<header class="w-full flex justify-between items-center p-2 flex-col gap-5 lg:flex-row lg:px-64">
    <a href="/" class="font-medium text-2xl">Movie database!</a>
    @livewire('search')
    @if(Auth::check())
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button class="text-lg p-2 rounded bg-sky-300 hover:bg-sky-200 transition cursor-pointer" type="submit">Logout</button>
        </form>
    @else
        <div class="flex gap-2">
            <a href="/login"
               class="text-lg p-2 rounded bg-sky-300 hover:bg-sky-200 transition cursor-pointer">Login</a>
            <a href="/register"
               class="text-lg p-2 rounded bg-sky-300 hover:bg-sky-200 transition cursor-pointer">Register</a>
        </div>
    @endif
</header>
