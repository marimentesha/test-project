<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('index');
    }

    public function contact(): View|Factory|Application
    {
        return view('contact');
    }

    public function store(): Application|Redirector|RedirectResponse
    {
        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        (new Contact())->create($attributes);
        return redirect('/');
    }

}
