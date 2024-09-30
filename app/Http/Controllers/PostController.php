<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\{Author, Post};
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(): View|Factory|Application
    {
        $posts = Post::with(['Author'])->simplePaginate(5);

        return view('posts.index', ['posts' => $posts]);
    }

    public function admin(): View|Factory|Application
    {
        $posts = Post::with(['Author'])->get();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create(): View|Factory|Application
    {
        return view('admin.posts.create', ['authors' => Author::all()]);
    }

    public function store(): Application|Redirector|RedirectResponse
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        (new Post)->create([
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'image' => request()->file('photo')->store('posts', 'public'),
            'author_id' => request()->input('author'),
        ]);
        return redirect('/admin');
    }

    public function show(Post $post): View|Factory|Application
    {
        return view('posts.show', ['post' => $post, 'comments' => $post->comments->load(['User'])]);
    }

    public function edit(Post $post): View|Factory|Application
    {
        return view('admin.posts.edit', ['post' => $post, 'authors' => (new Author)->all()]);
    }


    public function update(Post $post): Application|Redirector|RedirectResponse
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if(request()->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $post->update([
                'image' => request()->file('image')->store('posts', 'public'),
            ]);
        }

        $post->update([
            'title' => request('title'),
            'description' => request('description'),
            'author_id' => request('author_id'),
        ]);
        return redirect('/admin');
    }

    public function destroy(Post $post): Application|Redirector|RedirectResponse
    {
        $post->delete();
        return redirect('/admin');
    }

}
