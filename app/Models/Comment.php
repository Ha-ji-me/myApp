<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use HasFactory;
    // protected $fillable = [
    //     'body',
    //     'user_id',
    //     'incident_post_id'
    // ];

    public function IncidentPost(){
        return $this->belongsTo('App\Models\IncidentPost');
    }

    public function user(){
        throw new Exception('ローティングのテスト >>> model');
        return $this->belongsTo('App\Models\user');
    }
}
