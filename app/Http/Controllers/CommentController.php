<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request){
        $inputs=request()->validate([
            'body'=>'required|max:1000',
        ]);

        //1行でレコードを保存するcreateメソッド（saveメソッドの代わり）
        //モデルでfillableかguarded属性の設定が必須
        $comment=Comment::create([
            'body'=>$inputs['body'],
            'user_id'=>auth()->user()->id,
            'incident_post_id'=>$request->incident_post_id
        ]);

        return back();
    }
}
