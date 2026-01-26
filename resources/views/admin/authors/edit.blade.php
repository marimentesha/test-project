<x-admin-layout>
    <h2 class="main-title">Edit Author</h2>

    <x-update-form uri="/authors/{{$author->id}}" class="form">
        <div class="form-item">
            <x-form-input type="text" name="first_name" value="{{ $author->first_name }}" class="input"/>
            <x-form-error name="first_name"/>
        </div>
        <div class="form-item">
            <x-form-input type="text" name="last_name" value="{{ $author->last_name }}" class="input"/>
            <x-form-error name="last_name"/>
        </div>
        <div class="form-item">
            <input type="submit" value="update author!" class="admin-submit">
        </div>
    </x-update-form>

</x-admin-layout>
