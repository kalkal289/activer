<!--引数： $comment（一つのコメント）-->

<article class="comment">
    <div class="post-header">
    
        @include('parts.post_profile', [
        'post' => $comment,
        'is_post' => 'on',
        ])
        
        @if($comment->user_id == Auth::id())
            <div class="post-menu" onmouseleave="commentMenuHidden({{ $comment->id }})">
                <div class="post-menu-btn" onclick="commentMenuAppear({{ $comment->id }})">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
                <ul id="comment-menu-list{{ $comment->id }}" class="post-menu-list">
                    <li>
                        <form action="/comments/{{ $comment->id }}" id="deleteComment{{ $comment->id }}" method="post">
                            @csrf 
                            @method('DELETE') 
                            <button class="delete-btn" type="button" onClick="deleteComment({{ $comment->id }})">削除</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
    <div class="post-body">
        <p>{!! $comment->makeLink(e($comment->content)) !!}</p>
    </div>
    
    @include('parts.post_images', ['post' => $comment])
    
    <div class="comment-info">
        <small>投稿日: {{ $comment->created_at }}</small>
    </div>
</article>