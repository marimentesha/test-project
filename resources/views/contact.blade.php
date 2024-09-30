<x-layout>
    <x-slot:heading>Contact Us</x-slot:heading>
    <main>
        <div>
            <p style="font-size:20px">Got questions, feedback, or just want to say hi? We love hearing from you!
                Reach out to us anytime through our contact form, and we'll get back to you faster than you can refresh
                your
                browser.
                Whether it's a suggestion to make your experience better or a virtual high-five, we're all ears.</p>
        </div>
        <div style="align-items: center">
            <form action="/contact" method="post">
                @csrf
                <div>
                    <label for="first_name">first name:</label>
                    <input type="text" name="first_name">
                    <x-form-error name="first_name"/>

                    <label for="last_name">last name:</label>
                    <input type="text" name="last_name">
                    <x-form-error name="last_name"/>
                </div>

                <div>
                    <label for="email">email address:</label>
                    <input type="email" name="email">
                    <x-form-error name="email"/>
                </div>

                <div>
                    <label for='message'>message:</label>
                    <input type='text' name="message">
                    <x-form-error name="message"/>
                </div>
                <div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </main>

</x-layout>
