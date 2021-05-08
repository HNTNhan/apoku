<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $message_result = $tweet->like(auth()->user());

        return back()->with('message', $message_result);
    }

    public function destroy(Tweet $tweet)
    {
        $message_result = $tweet->dislike(auth()->user());

        return back()->with('message', $message_result);
    }
}
