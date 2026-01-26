<x-admin-layout>
    <h2 class="main-title">Create Post</h2>
    <form action="/posts" method="post" enctype='multipart/form-data' class="form">
        @csrf
        <div class="form-item">
            <x-form-input name="title" type="text" class="input"/>
            <x-form-error name='title'/>
        </div>
        <div class="form-item">
            <x-form-input name="description" type="text" class="input"/>
            <x-form-error name='description'/>
        </div>
        <div class="form-item">
            <input type="file" name="photo" class="input">
            <x-form-error name="photo"/>
        </div>
        <div class="form-item">
            <select name="author">
                @foreach ($authors as $author)
                    <option value="{{ $author->id}}">{{ $author->first_name . ' ' . $author->last_name}} </option>
                @endforeach
                <option value="" selected>No Author!</option>
            </select>
            <x-form-error name="author"/>
        </div>
        <div class="form-item">
            <input type="submit" value="create post!" class="admin-submit">
        </div>
    </form>
</x-admin-layout>
