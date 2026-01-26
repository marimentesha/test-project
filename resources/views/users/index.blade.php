<x-layout class="bg2">
    <x-slot:heading>profile</x-slot:heading>


    <div class="profile">
        <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)" class="prof-pic"/>

        <p> {{ $user->email }}</p>

        <div class="edit-delete">
            <a href="/users/{{$user->id}}/edit" class="button">Edit Profile</a>
            <x-delete-form uri="/users/{{ $user->id }}"/>
        </div>
    </div>

</x-layout>
