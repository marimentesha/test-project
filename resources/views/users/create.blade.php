<x-layout>
    <x-slot:heading> Sign up</x-slot:heading>
    <p style="font-size:medium;">Gain access to exclusive content, engage with like-minded individuals,
        and embark on a journey of discovery.
        Join us today and let's embark on this adventure together!</p>

    <form action="/register" method="post">
        @csrf
        <div>
            <label for="first name">first name:</label>
            <input type="text" id="first_name" name="first_name">
            <x-form-error name="first_name" />
        </div>

        <div>
            <label for="last_name">last name:</label>
            <input type="text" id="last_name" name="last_name">
            <x-form-error name="last_name" />
        </div>

        <div>
            <label for="email">email address:</label>
            <input type="text" id="email" name="email">
            <x-form-error name="email" />
        </div>

        <div>
            <label for="phone">phone number:</label>
            <input type="tel" id="phone" name="phone">
            <x-form-error name="phone" />
        </div>

        <div>
            <label for="password">create password:</label>
            <input type="password" id="password" name="password">
            <x-form-error name="password" />
        </div>

        <div>
            <label for="password_again">repeat password:</label>
            <input type="password" id="password_again" name="password_again">
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
