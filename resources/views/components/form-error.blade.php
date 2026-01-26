@props(['name'])

@error($name)
<pre {{$attributes->merge(['style'=>"color: darkred; font-size: 10px;"])}}>{{ $message }}</pre>
@enderror
