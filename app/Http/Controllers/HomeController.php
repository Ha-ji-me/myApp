<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentPost;
use App\Models\Comment;

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
        $incidentPosts = IncidentPost::orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        return view('home', compact('incidentPosts', 'user'));

        // return view('home');
    }

    public function myPost()
    {
        //新しい順に表示
        $user = auth()->user()->id;
        $incidentPosts = IncidentPost::where('user_id', $user)->orderBy('created_at', 'desc')->get();
        return view('myPost', compact('incidentPosts'));
    }

    public function myComment()
    {
        $user = auth()->user()->id;
        $comments = Comment::where('user_id', $user)->orderBy('created_at', 'desc')->get();
        return view('myComment', compact('comments'));
    }
}
