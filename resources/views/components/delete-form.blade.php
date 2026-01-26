@props(['uri'])

<form method="post" action="{{ $uri }}" {{$attributes}}>
    @csrf
    @method('DELETE')
    <button type="submit" class="submit">Delete</button>
</form>
