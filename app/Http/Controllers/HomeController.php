<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentPost;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\TodoPost;

class HomeController extends Controller
{
    /**
     * 最初に必ずauthを通す
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * ログインページへ
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 投稿DBの取得とログインユーザーを取得
     * 新しい順に投稿を表示
     * ペジネーションで投稿表示
     */
    public function index()
    {
        // $incidentPosts=IncidentPost::orderBy('created_at','desc')->get(); ペじネーションなしver
        $incidentPosts = IncidentPost::orderBy('created_at','desc')->where(function($query){
            //検索機能
            if ($search = request('search')) {
                $query->where('title', 'LIKE', "%{$search}%")->orWhere('body', 'LIKE', "%{$search}%");
            }
        })->paginate(10);

        $user=auth()->user();
        return view('home',compact('incidentPosts','user'));
    }

    /**
     * Show the application dashboard.
     *
     * 新しい順に表示
     * ペじネーションで自分の投稿を表示
     * 1月30日に変更を加えました。
     */
    public function myPost()
    {
        $user = auth()->user();  //右上ナビバー(app.blade)にアイコンを渡すための変数
        $userId = auth()->user()->id;  //$userから名前変更、同時に上の$userを作成
        // $incidentPosts=IncidentPost::where('user_id',$user)->orderBy('created_at','desc')->get();
        $incidentPosts = IncidentPost::where('user_id',$userId)->orderBy('created_at','desc')->paginate(10);
        return view('myPost',compact('incidentPosts','user'));
    }

    public function myComment()
    {
        $user = auth()->user();
        $userId = auth()->user()->id;
        // $comments=Comment::where('user_id',$user)->orderBy('created_at','desc')->get();
        $comments = Comment::where('user_id',$userId)->orderBy('created_at','desc')->paginate(10);
        return view('myComment',compact('comments','user'));
    }

    public function myFavorite()
    {
        $user = auth()->user();
        $userId = auth()->user()->id;
        $favorites = Favorite::where('user_id', $userId)->orderBy('created_at','desc')->paginate(10);
        return view('myFavorite', compact('favorites','user'));
    }


}
