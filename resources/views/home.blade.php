@extends('layouts.app')
@section('content')
@foreach ($incidentPosts as $incidentPost)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-3"> ①件名
                            <div class="text-muted small"> ②投稿者名</div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div>投稿日</div>
                            <div><strong> ③投稿作成日 </strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p> ④本文 </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
