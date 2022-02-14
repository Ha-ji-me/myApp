<?php

namespace App\Http\Controllers;

use App\Models\CompleteTodo;
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


    public function index(TodoPost $todoPost)
    {
        $user = auth()->user();
        $todoPosts = TodoPost::orderBy('created_at', 'desc')->paginate(10);
        $completeTodo = CompleteTodo::where('todo_post_id', $todoPost->id)->where('user_id', auth()->user()->id)->first();
        // dd($completeTodo);

        return view('todoPost.index', compact('todoPosts', 'user', 'completeTodo','todoPost'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('todoPost.create', compact('user'));
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title'=>'required|max:20',
            'body'=>'required|max:100'
        ]);

        $todoPost = new TodoPost();
        $todoPost->title = $request['title'];
        $todoPost->body = $request['body'];
        $todoPost->user_id = auth()->user()->id;
        $todoPost->save();

        // return redirect('todo-post/index')->with('message','投稿を作成しました！');
        return redirect('/todo-post')->with('message', '投稿を作成しました！');
    }

    public function myTodo()
    {
        $user = auth()->user();
        $userId = auth()->user()->id;
        $todoPosts = TodoPost::where('user_id', $userId)->orderBy('created_at','desc')->paginate(10);
        return view('myTodoPost', compact('todoPosts','user'));
    }

    /**
     * @param Request $request
     * @redirect
     */
    // public function update(Request $request)
    // {
    //     $params = $request->validated();
    //     $id = $request->input('id');
    //     $todoPost = new TodoPost();
    //     $todo = $todoPost->find($id);
    //     //TODO: 後でrequestに完了するか否かのフラグを送る
    //     $todo->update($params);

    //     return redirect('todoPost.index')->with('message', '投稿を作成しました！');
    // }
}
