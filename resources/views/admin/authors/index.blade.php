@php use Illuminate\Support\Facades\Auth; @endphp
<x-admin-layout>
    <h2 class="main-title">Authors</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>surname</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->first_name }}</td>
                <td>{{ $author->last_name }}</td>
                @if ($author->user_id == Auth::user()->id && Auth::user()->role->name == 'blogger')
                    <td>
                        <div class="edit-delete">
                        <a href="/authors/{{$author->id}}/edit" class="submit">Edit</a>
                        <x-delete-form uri="/authors/{{ $author->id }}"/>
                    </div>
                    </td>
                @elseif (Auth::user()->role->name == 'admin')
                    <td>
                        <div class="edit-delete">
                        <a href="/authors/{{$author->id}}/edit" class="submit">Edit</a>
                        <x-delete-form uri="/authors/{{ $author->id }}"/>
                    </div>
                    </td>
                @endif

            </tr>
        @endforeach
    </table>

</x-admin-layout>
