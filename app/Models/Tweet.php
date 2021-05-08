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
        'body',
        'images'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImagesAttribute($value)
    {
        if($value) {
            return asset('storage/' . $value);
        }
        return null;
    }

//    public function delete($tweet)
//    {
//        $tweet->delete();
//    }
}
