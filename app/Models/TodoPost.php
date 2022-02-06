<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoPost extends Model
{
    //userと紐ずく
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

}
