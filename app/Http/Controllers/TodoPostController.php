<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoPost;

class TodoPostController extends Controller
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


    public function index()
    {
        $user = auth()->user();
        $todoPosts = TodoPost::orderBy('created_at','desc')->paginate(10);

        return view('todoPost.index', compact('todoPosts','user'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('todoPost.create',compact('user'));
    }

    public function store(Request $request)
    {
        $inputs = $request->validate
        ([
            'title'=>'required|max:20',
            'body'=>'required|max:100'
        ]);

        $todoPost = new TodoPost();
        $todoPost->title = $request['title'];
        $todoPost->body = $request['body'];
        $todoPost->user_id = auth()->user()->id;
        $todoPost->save();

        // return redirect('todo-post/index')->with('message','投稿を作成しました！');
        return redirect('/todo-post')->with('message','投稿を作成しました！');
    }
}
