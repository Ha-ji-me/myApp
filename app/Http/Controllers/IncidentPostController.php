<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\IncidentPost;

class IncidentPostController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(IncidentPost::class, 'incidentPost');
    // }

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('incidentPost.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title'=>'required|max:50',
            'body'=>'required|max:1500',
            'image'=>'image|max:1024'
        ]);

        $incidentPost=new IncidentPost();
        $incidentPost->title = $inputs['title'];
        $incidentPost->body = $inputs['body'];
        $incidentPost->user_id = auth()->user()->id;

        if(request('image')){
            //画像に日時情報を付与して保存
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images',$name);
            $incidentPost->image = $name;
        }
        $incidentPost->save();
        return redirect('home')->with('message', '投稿を作成しました！');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IncidentPost $incidentPost)
    {
        $user = auth()->user();  //ナビバー部分(app.blade)にユーザーアイコンを渡すため
        $favorite = Favorite::where('incident_post_id', $incidentPost->id)->where('user_id', auth()->user()->id)->first();
        return view('incidentPost.show',compact('incidentPost', 'favorite', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidentPost $incidentPost)
    {
        $this->authorize('update', $incidentPost);

        return view('incidentPost.edit',compact('incidentPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncidentPost $incidentPost)
    {
        $this->authorize('update', $incidentPost);

        $inputs=$request->validate([
            'title'=>'required|max:50',
            'body'=>'required|max:1500',
            'image'=>'image|max:1024'
        ]);

        $incidentPost->title=$inputs['title'];
        $incidentPost->body=$inputs['body'];

        if(request('image')){
            $original=request()->file('image')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('image')->move('storage/images', $name);
            $incidentPost->image=$name;
        }

        $incidentPost->save();

        return redirect('home')->with('message', '投稿を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidentPost $incidentPost)
    {
        $this->authorize('delete',$incidentPost);

        //投稿記事に加え、コメントも同時に削除
        $incidentPost->comments()->delete();
        //投稿記事に加え、お気に入りも同時に削除
        $incidentPost->favorites()->delete();
        $incidentPost->delete();
        return redirect()->route('home')->with('message', '投稿を削除しました');
    }
}
