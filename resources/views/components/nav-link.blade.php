@props(['active' => false])

<a {{ $attributes->merge([ 'class' => ($active ? 'selected ' : '') ]) }}
    aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>

