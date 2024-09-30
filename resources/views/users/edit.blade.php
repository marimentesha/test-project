<x-layout>
    <x-slot:heading>edit profile</x-slot:heading>
    <div style="border-color:lightgray;border-style:ridge;margin:20px 10px;width:1500px;height:350px">
        <form action='/user/photo' method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div style="width:320px;height:350px;float:left">
                <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)" style="width:200px;height:200px;float:right" />
                <h2>Upload a different photo...</h2>

                <input type="file" name="photo" style="font-size: 15px" onchange="this.form.submit();">

                <x-form-error name="photo"/>
            </div>
        </form>
        <div>
            <form action="/users/{{ $user->id }}" method="post">
                @csrf
                @method('PATCH')


                <div style="width:350px;height:100px;float:left">
                    <label for="first_name">first name: </label>
                    <input type="text" name="first_name" placeholder="first name" value="{{ $user->first_name }}">
                    <x-profile-form-error name="first_name"/>
                </div>

                <div style="width:350px;height:100px;float:left">
                    <label for="last name">last name: </label>
                    <input type="text" name="last name" placeholder="last name" value="{{ $user->last_name }}">
                    <x-profile-form-error name="last_name"/>
                </div>

                <div style="width:350px;height:100px;float:left">
                    <label for="phone">phone number: </label>
                    <input type="text" name="phone" placeholder="phone number" value="{{ $user->phone }}">
                    <x-profile-form-error name="phone"/>
                </div>

                <div style="width:350px;height:100px;float:left">
                    <label for="email">email: </label>
                    <input type="email" name="email" placeholder="email" value="{{ $user->email }}">
                    <x-profile-form-error name="email"/>
                </div>

                <div style="width:350px;height:100px;float:left">
                    <label for="password_old">current password: </label>
                    <input type="password" name="password_old" placeholder="password">
                    <x-profile-form-error name="password_old"/>
                </div>

                <div style="width:350px;height:100px;float:left">
                    <label for="password">new password: </label>
                    <input type="password" name="password" placeholder="new password">
                    <x-profile-form-error name="password"/>
                </div>

                <div style="width:350px;height:100px;float:left">
                    <label for="password_again">verify password: </label>
                    <input type="password" name="password_again" placeholder="verify password">
                    <x-profile-form-error name="password_again"/>
                </div>
                <div style="width:20px;height:100px;margin:40px;float:left">
                    <button type="submit" style="width:60px;height:30px;background-color:darkolivegreen">save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
