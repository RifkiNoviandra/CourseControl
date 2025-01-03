@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <a href="{{ config('app.url') }}" style="display: inline-block;">
                <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="Basicshool logo">
            </a>
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
            <p>PT. Basicteknologi Intersolusi Tersinergi | <a href="https://basicteknologi.co.id/">View company</a>.</p>
        @endcomponent
    @endslot
@endcomponent
