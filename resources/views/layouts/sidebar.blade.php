<div class="list-group">
    <a href="{{route('home')}}"
    class="list-group-item {{url()->current()==route('home')? 'active' : ''}}">
        <i class="fas fa-home pr-2"></i><span>みんなの出来事</span>
    </a>

    <a href="{{route('incident-post.create')}}"
    class="list-group-item {{url()->current()==route('incident-post.create')? 'active' : ''}}">
        <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span>
    </a>

    <a href="{{route('home.myPost')}}"
    class="list-group-item {{url()->current()==route('home.myPost')?'active':''}}">
        <i class="fas fa-user-edit pr-2"></i><span>自分の投稿</span>
    </a>

    <a href="{{route('home.myComment')}}"
    class="list-group-item {{url()->current()==route('home.myComment')?'active':''}}">
        <i class="fas fa-user-edit pr-2"></i><span>コメントした投稿</span>
    </a>

    <!-- プロフィール編集は右上メニューバーに移動 -->
    <!-- <a href="{{route('profile.edit',auth()->user()->id)}}"
    class="list-group-item {{url()->current()==route('profile.edit', auth()->user()->id)?'active':''}}">
        <i class="fas fa-id-badge pr-2"></i><span>プロフィール編集</span>
    </a> -->

    @can('admin')
    <a href="{{route('profile.index')}}"
    class="list-group-item {{url()->current()==route('profile.index')?'active':''}}">
        <i class="fas fa-user-edit pr-2"></i><span>ユーザーアカウント</span>
    </a>
    @endcan
</div>
