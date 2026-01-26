<x-admin-layout>

    <h2 class="main-title">Create Author</h2>

    <form action="/admin/authors" method="post" class="form">
        @csrf
        <div class="form-item">
            <x-form-input name="first_name" type="text" class="input"/>
            <x-form-error name="first_name"/>
        </div>
        <div class="form-item">
            <x-form-input name="last_name" type="text" class="input"/>
            <x-form-error name="last_name"/>
        </div>
        <div class="form-item">
            <input type="submit" value="create author!" class="admin-submit">
        </div>
    </form>

</x-admin-layout>
