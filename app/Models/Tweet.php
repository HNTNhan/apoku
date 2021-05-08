<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory, Likable;

    protected $with = ['user'];

    protected $fillable = [
        'user_id',
        'body'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

//    public function delete($tweet)
//    {
//        $tweet->delete();
//    }
}
