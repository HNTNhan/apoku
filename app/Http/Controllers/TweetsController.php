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
        $attributes = request()->validate(['new_tweet' => 'required|max:255']);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['new_tweet']
        ]);

        return redirect()->route('home')->with('message', 'You created a new tweet!!!');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return back()->with('message', 'You deleted a tweet!!!');
    }
}
