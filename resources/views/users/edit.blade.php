<x-layout>
    <x-slot:heading>edit profile</x-slot:heading>

    <div class="update-form">
        <x-update-form uri="/user/photo" enctype="multipart/form-data">
            <div>
                <x-profile-picture :photo="asset('storage/' . auth()->user()->profile_photo)"/>
                <h2>Upload a different photo...</h2>

                <input type="file" name="photo" onchange="this.form.submit();">
                <x-form-error name="photo"/>
            </div>
        </x-update-form>

        <x-update-form uri="/users/{{ $user->id }}" class="update-form">

            <div class="form-item">
                <x-form-input name="first_name" type="text" value="{{ $user->first_name }}" class="input"/>
                <x-profile-form-error name="first_name"/>

                <x-form-input type="text" name="last_name" value="{{ $user->last_name }}" class="input"/>
                <x-profile-form-error name="last_name"/>
            </div>

            <div class="form-item">
                <x-form-input type="text" name="phone" value="{{ $user->phone }}" class="input"/>
                <x-profile-form-error name="phone"/>

                <x-form-input type="email" name="email" value="{{ $user->email }}" class="input"/>
                <x-profile-form-error name="email"/>
            </div>

            <div class="form-item">
                <x-form-input type="password" name="password_old" placeholder="password" class="input"/>
                <x-profile-form-error name="password_old"/>

                <x-form-input type="password" name="password" placeholder="new password" class="input"/>
                <x-profile-form-error name="password"/>

                <x-form-input type="password" name="password_again" placeholder="verify password" class="input"/>
                <x-profile-form-error name="password_again"/>
            </div>

            <div class="submit-update">
                <button type="submit" class="submit">save</button>
            </div>
        </x-update-form>
    </div>
</x-layout>
