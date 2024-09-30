<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('admin.authors.index',
            [
                'authors' => (new Author)->all(),
            ]
        );
    }

    public function create(): View|Factory|Application
    {
        return view('admin.authors.create');
    }

    public function store(): Application|Redirector|RedirectResponse
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $attributes = [
            'first_name' => request()->input('first_name'),
            'last_name' => request()->input('last_name'),
            'user_id' => Auth::id(),
        ];

        (new Author)->create($attributes);
        return redirect('/admin/authors');
    }

    public function edit(Author $author): View|Factory|Application
    {
        return view('admin.authors.edit', ['author' => $author]);
    }

    public function update(Author $author): Application|Redirector|RedirectResponse
    {
        $attributes = Request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $author->update($attributes);

        return redirect('/admin/authors');

    }

    public function destroy(Author $author): Application|Redirector|RedirectResponse
    {
        $author->delete();
        return redirect('/admin/authors');
    }

}
