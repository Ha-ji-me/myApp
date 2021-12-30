@extends('layouts.app')
@section('content')
<h1>{{$user->name}}さんも投稿しましょう！</h1>
@foreach ($incidentPosts as $incidentPost)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
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
                    <p> {{$incidentPost->body}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
