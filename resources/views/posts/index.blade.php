<x-layout>
    <x-slot:heading> Posts</x-slot:heading>

    @foreach ($posts as $post)
        <a href=" {{"/posts/$post->id"}}" class="posts">
            <h1 class="post">
                {{$post->first_name . " " . $post->last_name}}
                <x-post-pics :photo="asset('storage/' . $post->image)" style="height:200px;width:200px"/>
            </h1>
            <pre>
            <p style="text-align:left;margin:100px"> {{$post->title}}</p>
            </pre>
        </a>
    @endforeach
    <div>
        {{$posts->links()}}
    </div>
</x-layout>
