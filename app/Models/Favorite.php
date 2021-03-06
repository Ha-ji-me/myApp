<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\IncidentPost;

class Favorite extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function incidentPost()
    {
        return $this->belongsTo('App\Models\IncidentPost');
    }

}
