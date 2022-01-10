<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $inputs = request()->validate([
            'body' => 'required|max:1000',
        ]);

        // シンプルにsaveメソッド
        $comment = new Comment();
        $comment->body = $inputs['body'];
        $comment->user_id = auth()->user()->id;
        $comment->incident_post_id = $request->incident_post_id;
        $comment->save();

        return back();
    }
}
