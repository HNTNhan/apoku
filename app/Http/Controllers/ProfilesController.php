<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        //ddd( substr($user->avatar, strpos($user->avatar, 'avatar')));
        $attributes = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => 'required|string|max:255',
            'avatar' => ['file'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => 'required|string|confirmed|min:8',
        ]);

        if(request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
            $old_avatar = substr($user->avatar, strpos($user->avatar, 'avatar') );
            Storage::delete($old_avatar);
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
            $old_banner = substr($user->banner, strpos($user->banner, 'banner') );
            Storage::delete($old_banner);
        }


        $user->update($attributes);

        return redirect($user->path())->with('message', 'Update profile banner!!!');
    }
}
