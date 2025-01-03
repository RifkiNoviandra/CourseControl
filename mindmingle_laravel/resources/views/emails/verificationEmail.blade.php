@component('mail::message')
    <img src="{{ asset('assets/images/element/contact.svg') }}"
         style="max-width: 300px;" class="image-center" alt="image">
    <p><b>Hey {{ $details['username'] }},</b></p>
    <p>Yooo! Thanks for registering an account with Mind Mingle!
        You're the <b>student</b> now, let's learn something new today.
    </p>
    <br>
    <p>Before we get started, we'll need to verify your email.</p>
    @component('mail::button', ['url' => route('verify.user', $details['token'])])
        Verify Email
    @endcomponent
    <hr>
    <p>
        Be careful not to share your important data with parties on behalf of Mind Mingle or whose security cannot be
        guaranteed.
    </p>
@endcomponent