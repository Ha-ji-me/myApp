@extends('layouts.app')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <div class="text-muted small mr-3">
            <!-- ユーザー名 -->
            {{$incidentPost->user->name}}
        </div>
        <!-- タイトル -->
        <h4>{{$incidentPost->title}}</h4>
        <span class="ml-auto">
        <a href="{{route('incident-post.edit',$incidentPost)}}"><button class="btn btn-primary">編集</button></a>
        </span>
    </div>
    <div class="card-body">
        <p class="card-text">
            <!-- 記事内容 -->
            {{$incidentPost->body}}
        </p>
        <!-- 画像ファイル -->
        @if($incidentPost->image)
        <div>
            (画像ファイル：{{$incidentPost->image}})
        </div>
        <img src="{{asset('storage/images/'.$incidentPost->image)}}"
        class="img-fluid mx-auto d-block" style="height:300px;">
        @endif
    </div>
    <div class="card-footer">
        <span class="mr-2 float-right">
            <!-- 投稿日時 -->
            投稿日時 {{$incidentPost->created_at->diffForHumans()}}
        </span>
    </div>
</div>

@endsection
