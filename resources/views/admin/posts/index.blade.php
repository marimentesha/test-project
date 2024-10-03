@php use Illuminate\Support\Facades\Auth; @endphp
<x-admin-layout>

    <h2>Posts</h2>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>Author Name</th>
            <th>author id</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title}}</td>
                <td>{{ $post->description}}</td>
                <td>{{ $post->Author->first_name . ' ' . $post->Author->last_name}}</td>
                <td>{{ $post->author_id }}</td>

                @if ($post->Author->user_id == Auth::user()->id && Auth::user()->role->name == 'blogger')
                    <td>
                        <a href="/admin/posts/{{$post->id}}/edit" class="button">Edit</a>
                        <x-delete-form uri="/admin/posts/{{ $post->id }}"/>
                    </td>
                @elseif(Auth::user()->role->name == 'admin')
                    <td>
                        <a href="/admin/posts/{{$post->id}}/edit" class="button">Edit</a>
                        <x-delete-form uri="/admin/posts/{{ $post->id }}"/>
                    </td>
                @endif

            </tr>
        @endforeach
    </table>

</x-admin-layout>
