@props(['name'])

@error($name)
<pre {{$attributes->merge(['style'=>"color: darkred; font-size: 15px; margin-left:610px;"])}}>{{ $message }}</pre>
@enderror
