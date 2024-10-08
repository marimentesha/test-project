@php use Illuminate\Support\Facades\Auth; @endphp
<x-admin-layout>
    <h2>Authors</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>surname</th>
            <th>actions</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->first_name }}</td>
                <td>{{ $author->last_name }}</td>
                @if ($author->user_id == Auth::user()->id && Auth::user()->role->name == 'blogger')
                    <td>
                        <a href="/authors/{{$author->id}}/edit" class="button">Edit</a>
                        <x-delete-form uri="/authors/{{ $author->id }}"/>
                    </td>
                @elseif (Auth::user()->role->name == 'admin')
                    <td>
                        <a href="/authors/{{$author->id}}/edit" class="button">Edit</a>
                        <x-delete-form uri="/authors/{{ $author->id }}"/>
                    </td>
                @endif

            </tr>
        @endforeach
    </table>

</x-admin-layout>
