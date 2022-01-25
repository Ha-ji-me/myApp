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
     * 投稿DBの取得とログインユーザーを取得
     * 新しい順に投稿を表示
     * ペジネーションで投稿表示
     *
     */
    public function index()
    {
        // $incidentPosts=IncidentPost::orderBy('created_at','desc')->get(); ペじネーションなしver
        $incidentPosts=IncidentPost::orderBy('created_at','desc')->simplePaginate(10);
        $user=auth()->user();
        return view('home',compact('incidentPosts','user'));
    }

    /**
     * Show the application dashboard.
     *
     * 新しい順に表示
     * ペじネーションで自分の投稿を表示
     */
    public function myPost()
    {
        $user=auth()->user()->id;
        // $incidentPosts=IncidentPost::where('user_id',$user)->orderBy('created_at','desc')->get();
        $incidentPosts=IncidentPost::where('user_id',$user)->orderBy('created_at','desc')->simplePaginate(10);
        return view('myPost',compact('incidentPosts'));
    }

    public function myComment()
    {
        $user=auth()->user()->id;
        // $comments=Comment::where('user_id',$user)->orderBy('created_at','desc')->get();
        $comments=Comment::where('user_id',$user)->orderBy('created_at','desc')->simplePaginate(10);
        return view('myComment',compact('comments'));
    }

}
