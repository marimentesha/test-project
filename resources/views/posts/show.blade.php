<x-layout>
    <x-slot:heading>post</x-slot:heading>

    <div style="border-color:black;border-style:solid;height:250px">
        <x-post-pics :photo="asset('storage/' . $post->image)" style="margin:0;float:left"/>
            <p style="margin-top:70px"> {{ $post->description}}  </p>
    </div>
    <div style="margin-bottom:100px">
        <form action="/comment/{{ $post->id}}" method="POST" style="margin:10px 10px;">
            @csrf
            <label for="comment" style="float:left;">add a comment:</label>
            <input type="text" name="comment" style="float:left;width:95%">
            <button type="submit" style="float:right;">post</button>
        </form>
    </div>
    @foreach ($comments as $comment)
        <div class="comment" style="height:60px;margin-bottom:50px">
            <x-profile-picture :photo="asset('storage/' . $comment->user->profile_photo)" style="width:20px;height:20px;margin:0;float:left"/>

            <p style="font-size:smaller;padding:0;margin:0;float:left"> {{ $comment->user->first_name . " " . $comment->user->last_name}} </p>

            @if (!(request()->is("comment/$post->id/$comment->id/edit")))

                <div class="comment" style="margin:30px 3px;border:lightgray">
                    {{ $comment->comment}}
                </div>

                @if (auth())
                    <div style="float:right;">
                        @auth
                            @if (Auth::user()->id == $comment->user_id)
                                <a href="/comment/{{$post->id}}/{{$comment->id}}/edit" class="button">Edit</a>
                                <form method="post" action="/comment/{{ $post->id}}/{{ $comment->id}}"
                                      style="float:left;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endif
            @endif

            @if (request()->is("comment/$post->id/$comment->id/edit"))
                <form action="/comment/{{ $post->id}}/{{ $comment->id}}" method="POST" style="margin:10px 10px;">

                    @csrf
                    @method('PATCH')
                    <input type="text" name="comment" value="{{ $comment->comment}}" style="float:left;width:94%">
                    <button type="submit" style="float:right;">Edit</button>
                    <p style="color: red; font-size: 16px">
                        <x-form-error name="comment" style="float:left"/>
                    </p>
                </form>
            @endif

        </div>
    @endforeach
</x-layout>
