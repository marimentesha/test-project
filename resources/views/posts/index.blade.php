<x-layout class="bg3">
    <x-slot:heading> Posts</x-slot:heading>
    <div class="page">
        <div class="posts">
            @foreach ($posts as $post)
                <a href=" {{"/posts/$post->id"}}" class="post-link">
                    <x-post-pics :photo="asset('storage/' . $post->image)" class="post-pic"/>
                    <h1>{{$post->author->first_name . " " . $post->author->last_name}}</h1>
                    <p class="title"> {{$post->title}}</p>
                </a>
            @endforeach
        </div>

        <div class="paginate">
            {{$posts->links()}}
        </div>
    </div>
</x-layout>
