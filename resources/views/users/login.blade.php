<x-layout>
    <x-slot:heading>Login</x-slot:heading>
    <p style="font-size:medium;">Welcome back! Ready to dive back into your personalized experience?
        Simply log in to access all your saved preferences, continue your journey seamlessly,
        and pick up right where you left off. </p>
    <form action="/login" method="post">
        @csrf
        <div>
            <label for="email">email:</label>
            <input type="email" id="email" name="email">
            <x-form-error name="email"/>

            <label for="password">password:</label>
            <input type="password" id="password" name="password">
            <x-form-error name="password"/>

        </div>
        <div>
            <input type="submit" value="log in">
        </div>
    </form>
    <p style="font-size:small;">don't have an account?
        <a href="/register" style="text-decoration:underline;color:blue;">sign up</a>
    </p>

</x-layout>

