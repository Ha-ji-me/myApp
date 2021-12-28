<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentPost extends Model
{
    //ユーザー情報と紐づく
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

}
