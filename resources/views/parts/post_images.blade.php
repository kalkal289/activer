<!--引数： $post（一つのポスト）-->

@if($post->image1)
    <div class="post-images">
        <a href="{{ $post->image1 }}" data-lightbox="post-image{{ $post->id }}" class="{{ $post->image3 ? "post-image-many" : ($post->image2 ? "post-image-two" : "post-image-one") }}">
            <img class="post-image" src="{{ $post->image1 }}" alt="画像が読み込めません。" onClick="imageScaleUp({{ $post->image1 }})"/>
        </a>
        @if($post->image2)
            <a href="{{ $post->image2 }}" data-lightbox="post-image{{ $post->id }}" class="{{ $post->image3 ? "post-image-many" : "post-image-two" }}">
                <img class="post-image" src="{{ $post->image2 }}" alt="画像が読み込めません。"/>
            </a>
            @if($post->image3)
                <a href="{{ $post->image3 }}" data-lightbox="post-image{{ $post->id }}" class="post-image-many">
                    <img class="post-image" src="{{ $post->image3 }}" alt="画像が読み込めません。"/>
                </a>
                @if($post->image4)
                    <a href="{{ $post->image4 }}" data-lightbox="post-image{{ $post->id }}" class="post-image-many">
                        <img class="post-image" src="{{ $post->image4 }}" alt="画像が読み込めません。"/>
                    </a>
                @endif
            @endif
        @endif
    </div>
@endif