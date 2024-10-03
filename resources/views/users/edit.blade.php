<x-layout>
    <x-slot:heading>edit profile</x-slot:heading>
    <x-slot:background></x-slot:background>

    <div style="border-color:lightgray;border-style:ridge;margin:20px 10px;width:1500px;height:350px">
        <x-update-form uri="/user/photo" enctype="multipart/form-data" >
            <div style="width:320px;height:350px;float:left">
                <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)" style="width:200px;height:200px;float:right" />
                <h2>Upload a different photo...</h2>

                <input type="file" name="photo" style="font-size: 15px" onchange="this.form.submit();">
                <x-form-error name="photo"/>
            </div>
        </x-update-form>

        <div>
            <x-update-form uri="/users/{{ $user->id }}">
                <div class="size" >
                    <x-form-input name="first_name" type="text" value="{{ $user->first_name }}"/>
                    <x-profile-form-error name="first_name"/>
                </div>

                <div class="size">
                    <x-form-input type="text" name="last_name" value="{{ $user->last_name }}"/>
                    <x-profile-form-error name="last_name"/>
                </div>

                <div class="size">
                    <x-form-input type="text" name="phone" value="{{ $user->phone }}"/>
                    <x-profile-form-error name="phone"/>
                </div>

                <div class="size">
                    <x-form-input type="email" name="email" value="{{ $user->email }}"/>
                    <x-profile-form-error name="email"/>
                </div>

                <div class="size">
                    <x-form-input type="password" name="password_old" placeholder="password"/>
                    <x-profile-form-error name="password_old"/>
                </div>

                <div class="size">
                    <x-form-input type="password" name="password" placeholder="new password"/>
                    <x-profile-form-error name="password"/>
                </div>

                <div class="size">
                    <x-form-input type="password" name="password_again" placeholder="verify password"/>
                    <x-profile-form-error name="password_again"/>
                </div>
                <div style="width:20px;height:100px;margin:40px;float:left">
                    <button type="submit" style="width:60px;height:30px;background-color:darkolivegreen">save
                    </button>
                </div>
            </x-update-form>
        </div>
    </div>
</x-layout>
