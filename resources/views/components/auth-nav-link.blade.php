@props(['active' => false])

<a class="{{ $active ? 'selected' : '' }}"
   aria-current="{{ $active ? 'page': 'false' }}"
   {{ $attributes->merge(["style" => "float:right;padding:5px;margin:0;"]) }}
    >{{ $slot }}</a>
