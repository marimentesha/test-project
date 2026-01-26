@php use Illuminate\Support\Facades\Auth; @endphp
<x-admin-layout>

    <h2 class="main-title">Posts</h2>
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
                        <div class="edit-delete">
                        <a href="/admin/posts/{{$post->id}}/edit" class="submit">Edit</a>
                        <x-delete-form uri="/admin/posts/{{ $post->id }}"/>
                        </div>
                    </td>
                @elseif(Auth::user()->role->name == 'admin')
                    <td>
                        <div class="edit-delete">
                        <a href="/admin/posts/{{$post->id}}/edit" class="submit">Edit</a>
                        <x-delete-form uri="/admin/posts/{{ $post->id }}"/>
                        </div>
                    </td>
                @endif

            </tr>
        @endforeach
    </table>

</x-admin-layout>
