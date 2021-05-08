<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Null_;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) as sum_likes, sum(!liked) as sum_dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'tweet_id');
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => ($liked === true) ? ($this->isLikedBy($user) === true ? null : $liked) : ($this->isDislikedBy($user) === true ? null : $liked)
        ]);

        return ($liked === true) ? ($this->isLikedBy($user) === true ? 'You liked the tweet!!!' : 'You unliked the tweet!!!') : ($this->isDislikedBy($user) === true ? "You disliked the tweet!!!" : "You undisliked the tweet!!!");
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return !$user->likes()->where('tweet_id', $this->id)->where('liked', true)->get()->isEmpty();
        //$this->likes()->where('user_id', $user->id)->exists();
    }

    public function isDislikedBy(User $user)
    {
        return !$user->likes()->where('tweet_id', $this->id)->where('liked', false)->get()->isEmpty();
    }
}
