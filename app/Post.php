<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $guarded = ['id', 'created_at'];

    protected $fillable = ['posts', 'user_id'];

    public function users(){
        return $this->belongsTo('App\User');
    }
    //Postは１人のUserしか登録できない。（「１」側）
}


//リレーションを行う
//PostとUserは１対多の関係（Postは１人のUserしか登録できない。（「１」側）逆にUserは複数のPostができる（「多」側）
//protected $fillableを追記することで、指定したカラムに対してのみ、 createやupdateなどが可能になります。※fillable = 書き換え可能
