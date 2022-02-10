<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //出来事投稿情報と紐づく
    public function posts()
    {
        return $this->hasMany('App\Models\IncidentPost');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    //Roleと紐づく
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    //お気に入り機能
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    //Todo投稿情報と紐ずく
    public function todoPosts()
    {
        return $this->hasMany('App\Models\TodoPost');
    }

    //Todo完了機能
    public function completeTodo()
    {
        return $this->hasMany('App\Models\CompleteTodo');
    }

}
