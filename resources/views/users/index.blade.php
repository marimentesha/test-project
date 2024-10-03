<x-layout>
    <x-slot:heading>profile</x-slot:heading>
    <x-slot:background>bg2</x-slot:background>

    <div style="border-color:lightgray;border-style:ridge;width:450px;height:370px;margin: 50px auto auto;">
        <div style="width:320px;height:350px;float:left">
            <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)" style="width:200px;height:200px"/>

            <p style="margin:10px 40px 10px 120px; "> {{ $user->email }}</p>

            <div style="width:200px;height:20px;margin-top:15px;margin-left:130px;float:left;text-decoration: none;">
                <a href="/users/{{$user->id}}/edit" class="button" style="float:left;margin-right:5px">Edit Profile</a>
                <x-delete-form uri="/users/{{ $user->id }}"/>
            </div>
        </div>
    </div>
</x-layout>
