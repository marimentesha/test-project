<x-admin-layout>
    <form action="/posts" method="post" enctype='multipart/form-data' style="margin-top: 50px">
        @csrf
        <x-form-input name="title" type="text"/>
        <x-form-error name='title'/>

        <x-form-input name="description" type="text"/>
        <x-form-error name='description'/>

        <input type="file" name="photo" style="margin-top:10px;margin-left:610px">
        <x-form-error name="photo" />

        <select name="author" style="margin-top: 10px">
            @foreach ($authors as $author)
                <option value="{{ $author->id}}">{{ $author->first_name . ' ' . $author->last_name}} </option>
            @endforeach
            <option value="" selected>No Author!</option>
        </select>
        <x-form-error name="author"/>

        <input type="submit" value="create post!" style="margin-top: 10px;">
    </form>
</x-admin-layout>
