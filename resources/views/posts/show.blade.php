<x-layout class="bg3">
    <x-slot:heading>post</x-slot:heading>

    <div class="full-post">
        <x-post-pics :photo="asset('storage/' . $post->image)"/>
        <div class="description">
            <p class="post-title">{{ $post->title }}</p>
            <p> {{ $post->description}}  </p>
        </div>
    </div>

    <div class="add-comment">
        <form action="/comment/{{ $post->id}}" method="POST">
            @csrf
            <label for="comment">Leave a comment:</label>
            <input type="text" name="comment" class="comment-input">
            <button type="submit" class="submit">post</button>
        </form>
    </div>

    @foreach ($comments as $comment)
        <div class="comment">
            <div class="user">
                <x-profile-picture :photo="asset('storage/' . $comment->user->profile_photo)" class="user-pic"/>
                <p class="user-name"> {{ $comment->user->first_name . " " . $comment->user->last_name}} </p>
            </div>
            @if (!(request()->is("comment/$post->id/$comment->id/edit")))
                <div class="comment">
                    {{ $comment->comment}}
                </div>

                <div class="edit-delete">
                    @auth
                        @if (Auth::user()->id == $comment->user_id)
                            <a href="/comment/{{$post->id}}/{{$comment->id}}/edit" class="button">Edit</a>
                            <x-delete-form uri="/comment/{{ $post->id}}/{{ $comment->id}}"/>
                        @endif
                    @endauth
                </div>
            @endif

            @if (request()->is("comment/$post->id/$comment->id/edit"))
                <x-update-form uri="/comment/{{ $post->id}}/{{ $comment->id}}">

                    <input type="text" name="comment" value="{{ $comment->comment}}" class="comment-input">
                    <button type="submit" class="submit">Edit</button>

                    <p>
                        <x-form-error name="comment"/>
                    </p>
                </x-update-form>
            @endif

        </div>
    @endforeach
</x-layout>
