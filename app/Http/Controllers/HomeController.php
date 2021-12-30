<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentPost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //投稿DBの取得とログインユーザーを取得
        //新しい順に投稿を表示
        $incidentPosts=IncidentPost::orderBy('created_at','desc')->get();
        $user=auth()->user();
        return view('home',compact('incidentPosts','user'));

        // return view('home');
    }
}
