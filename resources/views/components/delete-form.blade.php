@props(['uri'])

<form method="post" action="{{ $uri }}" {{$attributes}}>
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
