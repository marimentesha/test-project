@props(['name'])

@error($name)
    <pre {{$attributes->merge(['style'=>"color: darkred; font-size: 15px; margin-left:5px;"])}}>{{ $message }}</pre>
@enderror
