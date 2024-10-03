<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

#[AllowDynamicProperties] class UserController extends Controller
{
    public function show(User $user): View|Factory|Application
    {
        return view('users.index', ['user' => $user]);
    }

    public function create(): View|Factory|Application
    {
        return view('users.create');
    }

    public function store(): Application|Redirector|RedirectResponse
    {
        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_again' => 'required|same:password',
            'phone' => 'required|unique:users',
        ]);

        $user = (new User())->create($attributes);

        Auth::login($user);

        return redirect('/');
    }

    public function login(): View|Factory|Application
    {
        return view('users.login');
    }


    /**
     * @throws ValidationException
     */
    public function signIn(): Application|Redirector|RedirectResponse
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'password' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    public function logout(): Application|Redirector|RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }

    public function edit(User $user): View|Factory|Application
    {
        return view('users.edit', ['user' => $user]);
    }

    public function updatePhoto()
    {
        $user = auth()->user();
        request()->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($user->profile_photo){
            Storage::disk('public')->delete($user->profile_photo);
        }

        if(request()->hasFile('photo')){
            $path = request()->file('photo')->store('profilePhotos', 'public');
            $user->update(['profile_photo' => $path]);
        }

        return redirect('users/' . Auth::id() . '/edit');
    }

    public function update(User $user): Application|Redirector|RedirectResponse
    {
        $passwordCondition = empty(request("password_old")) && empty(request("password_again")) && empty(request("password"));

        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
            'password_old' => '|required_with:password,password_again' . (!$passwordCondition ? "|current_password" :  ''),
            'password' => 'required_with:password_old,password_again' . (!$passwordCondition ? "|min:8" :  ''),
            'password_again' => 'same:password|required_with:password_old,password' ,
        ], [
            'password_old.required_with' => 'The current password is required.',
            'password.required_with' => 'The new password is required.',
            "password_again.required_with" => 'The repeat password field is required.',
        ]);

        $user->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => $passwordCondition ? Auth::user()->getAuthPassword() : bcrypt(request('password')),
            'phone' => request('phone'),

        ]);

        return redirect('/users/' . $user->id . '/edit');
    }


    public function destroy(User $user): Application|Redirector|RedirectResponse
    {
        $user->delete();

        return redirect('/');
    }

}
