<!--引数： $post（一つの投稿）-->

<article class="post post-shadow-color">
    <div class="post-header">
        
        @include('parts.post_profile', [
            'post' => $post,
            'is_post' => 'on',
        ])
        
        @if($post->user_id == Auth::id())
            <div class="post-menu" onmouseleave="postMenuHidden({{ $post->id }})">
                <div class="post-menu-btn" onclick="postMenuAppear({{ $post->id }})">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
                <ul id="post-menu-list{{ $post->id }}" class="post-menu-list hidden">
                    <li>
                        <form action="/posts/{{ $post->id }}" id="deletePost{{ $post->id }}" method="post">
                            @csrf 
                            @method('DELETE') 
                            <button class="delete-btn" type="button" onClick="deletePost({{ $post->id }})"><i class="fa-solid fa-trash"></i>削除</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
        
    </div>
    @if($post->is_big_post == 1)
        <small class="body-big-post">【ビッグポスト】</small>
    @endif
    
    @include('parts.post_body_images', ['post' => $post,])
    
    <div class="post-act-area">
        <div>
            <a href="/posts/{{ $post->id }}" class="post-act-btn post-comment-btn"><i class="fa-solid fa-comment"></i>コメント {{ $post->comments->count() }}</a>
        </div>
        <div>
            @if($post->is_liked_by_auth_user())
                <a href="/unlike/{{ $post->id }}" class="post-act-btn post-unlike-btn"><i class="fa-solid fa-heart"></i>いいね {{ $post->likes()->count() }}</a>
            @else
                <a href="/like/{{ $post->id }}" class="post-act-btn post-like-btn"><i class="fa-solid fa-heart"></i>いいね {{ $post->likes()->count() }}</a>
            @endif
        </div>
    </div>
    <div class="post-info">
        <small class="post-category">カテゴリー: {{ $post->category->name }}</small>
        <small>投稿日: {{ $post->created_at }}</small>
    </div>
</article>