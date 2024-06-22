<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }
    //Userは複数のPostができる（「多」側）
    // belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブル内で対応しているID名', '関係するモデルで対応しているID名');
    //（）の中に4つ書かなきゃいけない！！
    public function follows(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    public function followed(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }
    //フォローのリレーション（多対多は１対多のbelongsToManyメソッドを使う

    // フォローしているか
    // boolean trueかforceかで返してねという指示
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first();
    }
}
