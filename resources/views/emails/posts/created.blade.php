@component('mail::message')
    # {{ $post->title }}

    {{ $post->content }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
