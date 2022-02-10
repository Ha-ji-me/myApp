<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TodoPost;

class CompleteTodo extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function todoPost()
    {
        return $this->belongsTo('App\Models\TodoPost');
    }

}
