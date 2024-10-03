<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> {{ $heading }} </title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<nav>
    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
    <x-nav-link href="/posts" :active="request()->is('posts')">Posts</x-nav-link>
    <x-nav-link href="/contact" :active="request()->is('contact')">Contact us</x-nav-link>

    @guest
        <x-auth-nav-link href="/register" :active="request()->is('register')" >Sign
            up
        </x-auth-nav-link>
        <x-auth-nav-link href="/login" :active="request()->is('login')" >Login
        </x-auth-nav-link>
    @endguest

    @auth
        <x-auth-nav-link href="/users/{{Auth::user()->id}}" :active="request()->is('profile')" style="padding:0;border-radius:50%;width:25px;height:25px">
                    <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)"
                                       style="width:25px;height:25px;margin:2px;padding:0"/>
        </x-auth-nav-link>
        <a class="auth_button">
            <form method="POST" action="/logout">
                @csrf
                <button
                    style="background-color: darkgrey;border-style: hidden;float:right;padding:3px;">
                    Log Out
                </button>
            </form>
        </a>
    @endauth
</nav>
<body class="{{$background}}">

<header>
    <div>
        <h1 {{$attributes}}>{{$heading}}</h1>
    </div>
</header>
<main>
    {{$slot}}
</main>

</body>

</html>
