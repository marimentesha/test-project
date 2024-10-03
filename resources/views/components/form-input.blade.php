@props(['name'])

<label for="{{ $name }}">{{ str_replace('_', ' ', $name) }}:</label>
<input id="{{ $name }}" name="{{ $name }}"  {{ $attributes }}>
