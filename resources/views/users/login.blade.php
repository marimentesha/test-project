<x-layout class="bg2">
    <x-slot:heading>Login</x-slot:heading>

    <p class="sub-text">Welcome back! Ready to dive back into your personalized experience?
        Simply log in to access all your saved preferences, continue your journey seamlessly,
        and pick up right where you left off. </p>

    <div class="form">
        <form action="/login" method="post">
            @csrf
            <div class="form-item">
                <x-form-input type="email" name="email" class="input"/>
                <x-form-error name="email"/>
            </div>

            <div class="form-item">
                <x-form-input type="password" name="password" class="input"/>
                <x-form-error name="password"/>
            </div>

            <div class="form-item">
                <input type="submit" value="Log in" class="submit">
            </div>
        </form>
        <p class="small-text">don't have an account?
            <a href="/register">sign up</a>
        </p>
    </div>

</x-layout>

