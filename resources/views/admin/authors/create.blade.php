<x-admin-layout>

    <form action="/admin/authors" method="post" style="margin-top: 50px">
        @csrf
        <x-form-input name="first_name" type="text"/>
        <x-form-error name="first_name"/>

        <x-form-input name="last_name" type="text"/>
        <x-form-error name="last_name"/>

        <input type="submit" value="create author!" style="margin-top: 10px;">
    </form>

</x-admin-layout>
