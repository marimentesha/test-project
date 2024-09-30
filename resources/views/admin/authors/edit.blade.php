<x-admin-layout>


    <form action="{{ "/authors/$author->id" }}" method="post" style="margin-top: 50px">
        @csrf
        @method('PATCH')
        <input type="text" name="first_name" placeholder="name" value="{{ $author->first_name }}">
        <x-form-error name="first_name"/>
        <input type="text" name="last_name" placeholder="surname" value="{{ $author->last_name }}">
        <x-form-error name="last_name"/>
        <input type="submit" value="update author!" style="margin-top: 10px;">
    </form>

</x-admin-layout>
