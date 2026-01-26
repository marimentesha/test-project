<x-layout class="bg2">
    <x-slot:heading>Contact Us</x-slot:heading>

    <div class="sub-text">
        <p>Got questions, feedback, or just want to say hi? We love hearing from you!
            Reach out to us anytime through our contact form, and we'll get back to you
            faster than you can refresh your browser.</p>
    </div>
    <div class="form">
        <form action="/contact" method="post">
            @csrf
            <div class="form-item">
                <x-form-input type="text" name="first_name" class="input"/>
                <x-form-error name="first_name"/>
            </div>

            <div class="form-item">
                <x-form-input type="text" name="last_name" class="input"/>
                <x-form-error name="last_name"/>
            </div>

            <div class="form-item">
                <x-form-input type="email" name="email" class="input"/>
                <x-form-error name="email"/>
            </div>

            <div class="form-item">
                <x-form-input type='text' name="message" class="input"/>
                <x-form-error name="message"/>
            </div>
            <div class="form-item">
                <input type="submit" class="submit">
            </div>
        </form>
    </div>

</x-layout>
