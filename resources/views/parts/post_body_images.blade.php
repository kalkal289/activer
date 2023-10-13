<!--引数： $post（一つのポスト）-->

<div class="post-body">
    <p>
        @if(Request::routeIs('show'))
            {{ $post->content }}
        @else
            <a href="{{ route('show', ['post' => $post->id]) }}">{{ $post->content }}</a>
        @endif
    </p>
</div>
@if($post->image1)
    <div class="post-images">
    <img class="{{ ($post->image3) ? "post-image-many" : (($post->image2) ? "post-image-two" : "post-image-one") }}" src="{{ $post->image1 }}" alt="画像が読み込めません。"/>
        @if($post->image2)
            <img class="{{ ($post->image3) ? "post-image-many" : "post-image-two" }}" src="{{ $post->image2 }}" alt="画像が読み込めません。"/>
            @if($post->image3)
                <img class="post-image-many" src="{{ $post->image3 }}" alt="画像が読み込めません。"/>
                @if($post->image4)
                    <img class="post-image-many" src="{{ $post->image4 }}" alt="画像が読み込めません。"/>
                @endif
            @endif
        @endif
    </div>
@endif