<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store($post): RedirectResponse
    {
        $comment = new Comment();
        $request = request()->validate([
            'comment' => 'required',
        ]);

        $comment->create([
            'user_id' => (Auth::user()->id),
            'comment' => $request['comment'],
            'post_id' => $post,
        ]);

        return redirect()->back();
    }

    public function update(Post $post, Comment $comment): Application|Redirector|RedirectResponse
    {
        $request = Request()->validate([
            'comment' => 'required',
        ]);

        $comment->update([
            'comment' => $request['comment'],
        ]);

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post, Comment $comment): Application|Redirector|RedirectResponse
    {
        $comment->delete();

        return redirect('/posts/' . $post->id);
    }

}
