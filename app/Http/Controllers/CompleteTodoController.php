<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompleteTodo;
use App\Models\TodoPost;
use Illuminate\Support\Facades\Auth;

class CompleteTodoController extends Controller
{
    public function completeTodo(TodoPost $todoPost, Request $request)
    {
        // $user = auth()->user();
        // $todoPosts = TodoPost::orderBy('created_at', 'desc')->paginate(10);
        $completeTodo = New CompleteTodo();
        $completeTodo->todo_post_id = $todoPost->id;
        $completeTodo->user_id = Auth::user()->id;
        $completeTodo->save();
        // return view('todoPost.index', compact('completeTodo','todoPosts'));
        return back();
    }

    public function unCompleteTodo(TodoPost $todoPost, Request $request)
    {
        // $todoPosts = TodoPost::orderBy('created_at', 'desc')->paginate(10);

        $user = Auth::user()->id;
        $completeTodo = CompleteTodo::where('todo_post_id', $todoPost->id)->where('user_id', $user)->first();
        $completeTodo->delete();
        // return view('todoPost.index', compact('completeTodo','todoPosts'));
        return back();
    }

}
