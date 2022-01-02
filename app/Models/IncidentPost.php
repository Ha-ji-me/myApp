<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentPost extends Model
{
    //ユーザー情報と紐づく
    //メソッドでコメント内容を一括変更できるがなくても良い
    // use HasFactory;
    // protected $fillable = [
    //     'title',
    //     'body',
    //     'user_id',
    //     'image',
    // ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
