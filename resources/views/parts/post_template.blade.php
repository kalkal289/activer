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
                <ul id="post-menu-list{{ $post->id }}" class="post-menu-list">
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
    <div class="post-body">
        <p>
            @if(Request::routeIs('show'))
                {{ $post->content }}
            @else
                <a href="{{ route('show', ['post_id' => $post->id]) }}">{{ $post->content }}</a>
            @endif
        </p>
    </div>
    
    @include('parts.post_images', ['post' => $post])
    
    <div class="post-act-area">
        @if(Auth::guest())
            <div>
                <a href="{{ route('entrance', ['kind' => 1]) }}" class="post-act-btn post-comment-btn"><i class="fa-regular fa-comment"></i>コメント</a><span class="comments-count">{{ $post->comments->count() }}</span>
            </div>
            <div>
                <a href="{{ route('entrance', ['kind' => 0]) }}" class="post-act-btn post-like-btn"><span class="liked-heart"><i class="fa-regular fa-heart"></i></span>いいね</a><span class="likes-count">{{ $post->likes_count }}</span>
            </div>
        @else
            <div>
                <a href="{{ route('show', ['post_id' => $post->id]) }}" class="post-act-btn post-comment-btn"><i class="fa-regular fa-comment"></i>コメント</a><span class="comments-count">{{ $post->comments->count() }}</span>
            </div>
            <div>
                @if($post->is_liked_by_auth_user())
                    <span class="post-act-btn post-like-btn" data-post-id="{{ $post->id }}"><span class="liked-heart hidden"><i class="fa-regular fa-heart"></i></span><span class="not-liked-heart"><i class="fa-solid fa-heart"></i></span>いいね<span class="flow-heart"><i class="fa-solid fa-heart"></i></span></span><span class="likes-count">{{ $post->likes_count }}</span>
                @else
                    <span class="post-act-btn post-like-btn" data-post-id="{{ $post->id }}"><span class="liked-heart"><i class="fa-regular fa-heart"></i></span><span class="not-liked-heart hidden"><i class="fa-solid fa-heart"></i></span>いいね<span class="flow-heart"><i class="fa-solid fa-heart"></i></span></span><span class="likes-count">{{ $post->likes_count }}</span>
                @endif
            </div>
        @endif
    </div>
    <div class="post-info">
        <small class="post-category">カテゴリー: {{ $post->category->name }}</small>
        <small>投稿日: {{ $post->created_at }}</small>
    </div>
</article>