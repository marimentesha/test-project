<x-admin-layout>

    <x-update-form uri="/authors/{{$author->id}}" style="margin-top: 50px" >
        <x-form-input type="text" name="first_name" value="{{ $author->first_name }}"/>
        <x-form-error name="first_name"/>

        <x-form-input type="text" name="last_name" value="{{ $author->last_name }}"/>
        <x-form-error name="last_name"/>

        <input type="submit" value="update author!" style="margin-top: 10px;">
    </x-update-form>

</x-admin-layout>
