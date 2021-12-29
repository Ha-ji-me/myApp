@extends('layouts.app')
@section('content')
{{$user->name}}さんも投稿しましょう！
@foreach ($incidentPosts as $incidentPost)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-3"> {{$incidentPost->title}}
                            <div class="text-muted small"> {{$incidentPost->user->name}}</div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div>投稿日</div>
                            <div><strong> {{$incidentPost->created_at->diffForHumans()}} </strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p> {{$incidentPost->body}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
