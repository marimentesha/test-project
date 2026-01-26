<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> {{ $heading }} </title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<nav class="nav">
    <x-nav-link href="/" :active="request()->is('/')" class="nav-link">Home</x-nav-link>
    <x-nav-link href="/posts" :active="request()->is('posts')" class="nav-link">Posts</x-nav-link>
    <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link">Contact us</x-nav-link>
    <div class="nav-right">
    @guest
        <x-nav-link href="/register" :active="request()->is('register')" class="nav-link">Sign up</x-nav-link>
        <x-nav-link href="/login" :active="request()->is('login')" class="nav-link">Login</x-nav-link>
    @endguest

    @auth
        <x-nav-link  href="/users/{{Auth::user()->id}}" :active="request()->is('profile')">
            <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)" class="profile-pic"/>
        </x-nav-link>
        <a>
            <form method="POST" action="/logout">
                @csrf
                <button class="logout">
                    Log out
                </button>
            </form>
        </a>
    @endauth
    </div>
</nav>

<body {{$attributes}}>

<header>
    <div>
        <p class="main-title">{{$heading}}</p>
    </div>
</header>
<main>
    {{$slot}}
</main>

</body>

</html>
