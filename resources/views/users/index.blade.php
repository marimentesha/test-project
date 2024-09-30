<x-layout>
    <x-slot:heading>profile</x-slot:heading>
    <div style="border-color:lightgray;border-style:ridge;margin:50px 500px;width:450px;height:370px">
        <div style="width:320px;height:350px;float:left">
            <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)" style="width:200px;height:200px"/>

            <p style="margin:10px 40px 10px 120px; "> {{ $user->email }}</p>

            <div
                style="width:200px;height:20px;margin-top:15px;margin-left:130px;float:left;text-decoration: none;">
                <a href="/users/{{ $user->id }}/edit" class="button" style="float:left;">edit profile</a>
                <form method="post" action="/users/{{ $user->id }}" style="float:left;margin-left:10px">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete account</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
