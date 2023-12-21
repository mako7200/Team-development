<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];//一括代入

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    function occupation()
    {
        return $this->belongsTo('App\Models\Occupation');
    }

    function likes()    //likeモデルとのリレーション
    {
        return $this->hasMany('App\Models\Like');
    }

    public function likedBy($user)      //指定されたユーザーが指定された投稿にいいねをしているかどうかを確認するための Eloquent クエリを返すメソッド
    {
        return Like::where('user_id', $user->id)->where('post_id', $this->id);
    }
}
