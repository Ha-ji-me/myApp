@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h2 class="mt4" style="text-align:center">投稿の編集</h2>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    @if(empty($errors->first('image')))
                    <li>画像ファイルがあれば、再度、選択してください。</li>
                    @endif
                </ul>
            </div>
            @endif

            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <form method="post" action="{{route('incident-post.update',$incidentPost)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{old('title', $incidentPost->title)}}" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label for="body">内容</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{old('body', $incidentPost->body)}}</textarea>
                </div>

                <div class="form-group">
                    <div>
                        @if($incidentPost->image)
                        <img src="{{ asset('storage/images/'.$incidentPost->image)}}"
                        class="img-fluid rmx-auto d-block" style="height:200px;">
                        @endif
                    </div>
                    <label for="image">画像（1MBまで）</label>
                    <div class="col-md-6">
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">送信する</button>
            </form>
        </div>
    </div>
</div>

@endsection
