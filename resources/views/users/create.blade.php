<x-layout>
    <x-slot:heading> Sign up</x-slot:heading>
    <x-slot:background>bg2</x-slot:background>

    <p style="font-size:medium;">Gain access to exclusive content, engage with like-minded individuals,
        and embark on a journey of discovery.
        Join us today and let's embark on this adventure together!</p>

    <form action="/register" method="post">
        @csrf
        <div>
            <x-form-input name="first_name" type="text"/>
            <x-form-error name="first_name" />
        </div>

        <div>
            <x-form-input name="last_name" type="text"/>
            <x-form-error name="last_name" />
        </div>

        <div>
            <x-form-input name="email" type="email"/>
            <x-form-error name="email" />
        </div>

        <div>
            <x-form-input name="phone" type="tel"/>
            <x-form-error name="phone" />
        </div>

        <div>
            <x-form-input name="password" type="password"/>
            <x-form-error name="password" />
        </div>

        <div>
            <x-form-input name="password_again" type="password"/>
            <x-form-error name="password_again" />
        </div>

        <div>
            <input type="submit" value="register">
        </div>

        <p style="font-size:small;">already have an account?
            <a href="/login" style="text-decoration:underline;color:blue;">log in</a>
        </p>

    </form>

</x-layout>
