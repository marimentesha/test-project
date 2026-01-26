<x-layout class="bg2">
    <x-slot:heading> Sign up</x-slot:heading>

    <p class="sub-text">Join us today and let's embark on this adventure together!</p>

    <div class="form">
        <form action="/register" method="post">
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
                <x-form-input name="email" type="email" class="input"/>
                <x-form-error name="email"/>
            </div>

            <div class="form-item">
                <x-form-input name="phone" type="tel" class="input"/>
                <x-form-error name="phone"/>
            </div>

            <div class="form-item">
                <x-form-input name="password" type="password" class="input"/>
                <x-form-error name="password"/>
            </div>

            <div class="form-item">
                <x-form-input name="password_again" type="password" class="input"/>
                <x-form-error name="password_again"/>
            </div>

            <div class="form-item">
                <input type="submit" value="Register" class="submit">
            </div>

            <p class="small-text">already have an account?
                <a href="/login">log in</a>
            </p>
        </form>
    </div>
</x-layout>
