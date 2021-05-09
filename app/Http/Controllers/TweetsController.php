<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{

    public function index() {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
//        ddd(\request('post_image'));
        $attributes = request()->validate([
            'new_tweet' => 'required|max:255',
            'post_image' => 'file'
        ]);

        if(request('post_image')) {
            $attributes['post_image'] = request('post_image')->store('post_image');
        } else {
            $attributes['post_image'] = null;
        }

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['new_tweet'],
            'images' => $attributes['post_image']
        ]);

        return redirect()->route('home')->with('message', 'You created a new tweet!!!');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return back()->with('message', 'You deleted a tweet!!!');
    }
}
