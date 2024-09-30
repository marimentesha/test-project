<x-admin-layout>

    <form action="<?= "/admin/posts/$post->id" ?>" enctype="multipart/form-data" method="post" style="margin-top: 50px">
        @csrf
        @method('PATCH')

        <input type="text" name="title" placeholder='title' value="<?= $post->title ?>">
        <x-form-error name="title" />

        <input type="text" name="description" placeholder='description' value="<?= $post->description ?>"
               style="margin-top: 10px;">
        <x-form-error name="description" />

        <input type="file" name="image" style="margin-top:10px;margin-left:610px">
        <x-form-error name="image"  />

        <select name="author_id" style="margin-top: 10px">
            @foreach ($authors as $author)
                <option value="{{ $author->id}}" {{$author->id == $post->author_id ? 'selected' : ''}}>
                    {{ $author->first_name . ' ' . $author->last_name}}
                </option>
            @endforeach

            <option value="" {{ $post->author_id !== null ? "" : "selected" }} >No Author!</option>
        </select>
        <x-form-error name="author_id"/>

        <input type="submit" value="edit post!" style="margin-top: 10px;">
    </form>

</x-admin-layout>
