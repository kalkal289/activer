<!--引数： $main（一つのメインコンテンツ）-->

<article class="post main-shadow-color">
    <div class="post-header">
        <div class="content-title-area">
            <h2 class="content-title">{{ $main->title }}</h2>
        </div>
        @if($main->user_id == Auth::id())
            <div class="post-menu" onmouseleave="postMenuHidden({{ $main->id }})">
                <div class="post-menu-btn" onclick="postMenuAppear({{ $main->id }})">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
                <ul id="post-menu-list{{ $main->id }}" class="post-menu-list">
                    <li>
                        <a class="edit-btn" href="{{ route('editMain', ['main' => $main->id]) }}">編集</a>
                    </li>
                    <li>
                        <form action="/mains/{{ $main->id }}" id="deleteMain{{ $main->id }}" method="post">
                            @csrf 
                            @method('DELETE') 
                            <button class="delete-btn" type="button" onClick="deleteMain({{ $main->id }})"><i class="fa-solid fa-trash"></i>削除</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
    
    @include('parts.post_body_images', ['post' => $main,])
    
    <div class="content-footer">
        <div class="content-info">
          <small class="post-category">カテゴリー: {{ $main->category->name }}</small>
          <small>更新日: {{ $main->updated_at }}</small>
        </div>
        
        @include('parts.post_profile', [
            'post' => $main,
            'is_post' => '',
        ])
        
    </div>
</article>