<x-admin-layout>

    <form action="/admin/authors" method="post" style="margin-top: 50px">
        @csrf
        <input type="text" name="first_name" placeholder="name">
        <x-form-error name="first_name"/>
        <input type="text" name="last_name" placeholder="surname">
        <x-form-error name="last_name"/>
        <input type="submit" value="create author!" style="margin-top: 10px;">

    </form>

</x-admin-layout>
