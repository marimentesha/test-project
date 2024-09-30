<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<nav>
    <x-nav-link href="/admin" :active="request()->is('admin')">Posts</x-nav-link>
    <x-nav-link href="/admin/posts/create" :active="request()->is('admin/posts/create')">Create post</x-nav-link>
    <x-nav-link href="/admin/authors" :active="request()->is('admin/authors')">Authors</x-nav-link>
    <x-nav-link href="/admin/authors/create" :active="request()->is('admin/authors/create')">Create author</x-nav-link>
</nav>
<main>
    {{$slot}}
</main>
</body>
</html>
