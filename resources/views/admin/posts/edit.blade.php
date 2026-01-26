<x-admin-layout>
    <h2 class="main-title">Edit Post</h2>

    <x-update-form uri="/admin/posts/{{ $post->id }}" enctype="multipart/form-data" class="form">
        <div class="form-item">
            <x-form-input type="text" name="title" value="{{ $post->title }}" class="input"/>
            <x-form-error name="title"/>
        </div>
        <div class="form-item">
            <x-form-input type="text" name="description" value="{{ $post->description }}" class="input"/>
            <x-form-error name="description"/>
        </div>
        <div class="form-item">
            <input type="file" name="image" class="input">
            <x-form-error name="image"/>
        </div>
        <div class="form-item">
            <select name="author_id">
                @foreach ($authors as $author)
                    <option value="{{ $author->id}}" {{$author->id == $post->author_id ? 'selected' : ''}}>
                        {{ $author->first_name . ' ' . $author->last_name}}
                    </option>
                @endforeach

                <option value="" {{ $post->author_id !== null ? "" : "selected" }} >No Author!</option>
            </select>
        </div>
        <x-form-error name="author_id"/>
        <div class="form-item">
            <input type="submit" value="edit post!" class="admin-submit">
        </div>
    </x-update-form>

</x-admin-layout>
