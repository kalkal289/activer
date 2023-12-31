<!--引数： $store（一つのストア）-->

<article class="post store-shadow-color">
    <div class="post-header">
        <div class="content-title-area">
            <h2 class="content-title">{{ $store->title }}</h2>
        </div>
        @if($store->user_id == Auth::id())
            <div class="post-menu" onmouseleave="postMenuHidden({{ $store->id }})">
                <div class="post-menu-btn" onclick="postMenuAppear({{ $store->id }})">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
                <ul id="post-menu-list{{ $store->id }}" class="post-menu-list">
                    <li>
                        <a class="edit-btn" href="{{ route('editStore', ['store' => $store->id]) }}">編集</a>
                    </li>
                    <li>
                        <form action="/stores/{{ $store->id }}" id="deleteStore{{ $store->id }}" method="post">
                            @csrf 
                            @method('DELETE') 
                            <button class="delete-btn" type="button" onClick="deleteStore({{ $store->id }})"><i class="fa-solid fa-trash"></i>削除</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
    <div class="post-body">
        <p>{!! nl2br($store->makeLink(e($store->content))) !!}</p>
    </div>
    
    @include('parts.post_images', ['post' => $store])
    
    <div class="content-footer">
        <div class="content-info">
          <small class="post-category">カテゴリー: {{ $store->storecategory->name }}</small>
          <small>更新日: {{ $store->updated_at }}</small>
        </div>
        
        @include('parts.post_profile', [
            'post' => $store,
            'is_post' => '',
        ])
        
    </div>
</article>