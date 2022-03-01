<div class="list-group ">
    <a href="{{route('home')}}"
    class="list-group-item  {{url()->current()==route('home')? 'active' : ''}}">
        <i class="fas fa-home pr-2" style="color: #686b68;"></i><span>みんなの出来事</span>
    </a>

    <a href="{{route('incident-post.create')}}"
    class="list-group-item {{url()->current()==route('incident-post.create')? 'active' : ''}}">
        <i class="fas fa-pen-nib pr-2 " style="color: #686b68;"></i><span> 新規投稿</span>
    </a>

    <a href="{{route('home.myPost')}}"
    class="list-group-item {{url()->current()==route('home.myPost')?'active':''}}">
        <i class="fas fa-user-edit pr-2" style="color: #686b68;"></i><span>自分の投稿</span>
    </a>

    <a href="{{route('home.myComment')}}"
    class="list-group-item {{url()->current()==route('home.myComment')?'active':''}}">
        <i class="fas fa-light fa-comments pr-2" style="color: #686b68;"></i><span>コメントした投稿</span>
    </a>

    <a href="{{route('home.myFavorite')}}"
    class="list-group-item {{url()->current()==route('home.myFavorite')?'active':''}}">
        <i class="fas fa-light fa-solid fa-heart pr-2" style="color: #686b68;"></i><span>お気に入りにした投稿</span>
    </a>

    <!-- 最後に新規投稿メニューバーの子要素としてまとめる -->
    <a href="{{route('todo-post.create')}}"
    class="list-group-item {{url()->current()==route('todo-post.create')?'active':''}}">
        <i class="fas fa-light fa-solid fa-heart pr-2" style="color: #686b68;"></i><span>Todoの新規投稿</span>
    </a>

    <a href="{{route('todo-post.index')}}"
    class="list-group-item {{url()->current()==route('todo-post.index')?'active':''}}">
        <i class="fas fa-light fa-solid fa-heart pr-2" style="color: #686b68;"></i><span>みんなのTodo</span>
    </a>


    @can('admin')
    <a href="{{route('profile.index')}}"
    class="list-group-item {{url()->current()==route('profile.index')?'active':''}}">
        <i class="fas fa-user-edit pr-2" style="color: #686b68;"></i><span>ユーザーアカウント</span>
    </a>
    @endcan

    <!-- プロフィール編集は右上メニューバーに移動 -->
    <!-- <a href="{{route('profile.edit',auth()->user()->id)}}"
    class="list-group-item {{url()->current()==route('profile.edit', auth()->user()->id)?'active':''}}">
        <i class="fas fa-id-badge pr-2"></i><span>プロフィール編集</span>
    </a> -->

</div>
<script>
    console.log('テスト')
</script>
