<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        //ddd(request('showBanner'));
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(50),
            'show_banner' => request('show_banner'),
        ]);
    }

    public function edit(User $user)
    {
        //$this->authorize('edit', $user);
        //abort_if($user->isNot(auth()->user()), 404);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => 'required|string|max:255',
            'avatar' => ['file'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => 'required|string|confirmed|min:8',
        ]);

        if(request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }


        $user->update($attributes);

        return redirect($user->path())->with('message', 'Update profile success!!!');
    }

    public function update_banner(User $user)
    {
        //ddd(request('banner'));
        $attributes = request()->validate([
            'banner' => ['file', 'required'],
        ]);

        if(request('banner')) {
            $attributes['banner'] = request('banner')->store('banner');
        }


        $user->update($attributes);

        return redirect($user->path())->with('message', 'Update profile banner!!!');
    }
}
