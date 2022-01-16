@extends('layouts.app')
@section('content')

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<!-- <div class="ml-2 mb-3">
    home
</div> -->

<h4>{{$user->name}}さんも投稿を共有しましょう！</h4>

@foreach ($incidentPosts as $incidentPost)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <img src="{{asset('storage/avatar/'.($incidentPost->user->avatar??'user_default.jpg'))}}"
                        class="rounded-circle" style="width:40px;height:40px;">
                        <!-- タイトル -->
                        <div class="media-body ml-3"><a href="{{route('incident-post.show',$incidentPost)}}">{{$incidentPost->title}}</a>
                            <!-- ユーザー名 -->
                            <div class="text-muted small"> {{$incidentPost->user->name}}</div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div>投稿日</div>
                            <!-- 投稿日（最新順） -->
                            <div><strong> {{$incidentPost->created_at->diffForHumans()}} </strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- 記事内容 -->
                    <!-- 表示文字数を制限 -->
                    <p> {{ Str::limit($incidentPost->body,100,'...') }} </p>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                    <div class="px-4 pt-3">
                        @if($incidentPost->comments->count())
                        <span class="badge badge-success">
                            コメント{{$incidentPost->comments->count()}}件
                        </span>
                        @else
                        <span class="badge badge-secondary">コメント0件</span>
                        @endif
                    </div>
                    <div class="px-4 pt-3">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('incident-post.show',$incidentPost)}}" style="color:white;">詳細を見る</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
