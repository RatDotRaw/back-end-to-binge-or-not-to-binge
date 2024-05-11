
<nav class="navbar navbar-expand-lg navbar-light bg-light">
{{--    <p>{{ Auth::id() }}</p>--}}
    <a class="navbar-brand" href="{{ route('home') }}">Home</a>
    <a class="navbar-brand" href="{{ route('video.random') }}">random video</a>
    <div class="grow"></div>
    @if(Auth::check())
        <a class="nav-link" href="{{ route('users.logout') }}">Logout</a>
        {{-- link to own profile --}}
        <a class="nav-link" href="{{ route('users.profile', ['id' => Auth::id()]) }}">Profile</a>
        {{-- link to history --}}
        <a class="nav-link" href="{{ route('users.history') }}">History</a>
    @else
        <a class="nav-link" href="{{ route('users.login') }}">Login</a>
        <a class="nav-link" href="{{ route('users.register') }}">Register</a>
    @endif
</nav>
