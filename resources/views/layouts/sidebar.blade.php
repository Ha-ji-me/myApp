<div class="list-group">
    <a href="{{route('home')}}"
    class="list-group-item {{url()->current()==route('home')? 'active' : ''}}">
        <i class="fas fa-home pr-2"></i><span>みんなの投稿</span>
    </a>

    <a href="{{route('incident-post.create')}}"
    class="list-group-item {{url()->current()==route('incident-post.create')? 'active' : ''}}">
        <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span>
    </a>

    <a href="{{route('home.myPost')}}"
    class="list-group-item {{url()->current()==route('home.myPost')?'active':''}}">
        <i class="fas fa-user-edit pr-2"></i><span>自分の投稿</span>
    </a>
</div>
