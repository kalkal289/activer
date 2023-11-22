<!--引数： $notification（一つの通知）-->
@if($notification->type == 'like')

    <?php 
        $users = $notification->userModels($notification->data['like_users']);
        $post = $notification->postModel($notification->data['post_id']);
        $user_count = $notification->data['like_count'];
    ?>
    
    <a href="{{ route('showLikes', ['post_id' => $post->id]) }}">
        <article class="notice-article {{ strtotime($check_at) < strtotime($notification->updated_at) ? "bg-blue-50" : "" }}">
            <div class="flex">
                <div class="text-pink-300 notice-mark">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="grow h-10">
                    <div class="notice-user-images">
                        @for($i = 0; $i < $user_count && $i < 4; $i++)
                            @if($users[$i]->profile_image)
                                <img class="notice-user-image" src="{{ $users[$i]->profile_image }}" alt="プロフィール画像" />
                            @else
                                <img class="notice-user-image" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                            @endif
                        @endfor
                        @if($user_count > 4)
                            <div class="flex flex-col justify-end leading-16 text-3xl ml-2">...</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-full mt-1">
                @if($user_count == 1)
                    <p><span class="font-bold">{{ $users[0]->name }}</span>さんがあなたの投稿にいいねしました</p>
                @else
                    <p><span class="font-bold">{{ $users[0]->name}}</span>さんを含む{{ $user_count }}人があなたの投稿にいいねしました</p>
                @endif
            </div>
            <div class="mt-1">
                <p class="text-gray-500 text-sm">{!! nl2br($post->content) !!}</p>
                <p class="text-gray-500 text-sm mt-1">{{ $post->image1 ? ($post->image2 ? ($post->image3 ? ($post->image4 ? "[添付画像4枚]" : "[添付画像3枚]") : "[添付画像2枚]") : "[添付画像1枚]") :"" }}</p>
            </div>
            
            <small class="mt-2">{{ $notification->updated_at }}</small>
        </article>
    </a>
    
@elseif($notification->type == 'follow')

    <?php 
        $users = $notification->userModels($notification->data['follow_users']);
        $user_count = $notification->data['follow_count'];
    ?>
    
    <a href="{{ route('followers', ['user' => Auth::id()]) }}">
        <article class="notice-article {{ strtotime($check_at) < strtotime($notification->updated_at) ? "bg-blue-50" : "" }}">
            <div class="flex">
                <div class="text-blue-300 notice-mark">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="grow h-10">
                    <div class="notice-user-images">
                        @for($i = 0; $i < $user_count && $i < 4; $i++)
                            @if($users[$i]->profile_image)
                                <img class="notice-user-image" src="{{ $users[$i]->profile_image }}" alt="プロフィール画像" />
                            @else
                                <img class="notice-user-image" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                            @endif
                        @endfor
                        @if($user_count > 4)
                            <div class="flex flex-col justify-end leading-16 text-3xl ml-2">...</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-full mt-1">
                @if($user_count == 1)
                    <p><span class="font-bold">{{ $users[0]->name }}</span>さんがあなたをフォローしました</p>
                @else
                    <p><span class="font-bold">{{ $users[0]->name}}</span>さんを含む{{ $user_count }}人があなたをフォローしました</p>
                @endif
            </div>
            
            <small class="mt-2">{{ $notification->updated_at }}</small>
        </article>
    </a>
    
@elseif($notification->type == 'comment')

    <?php 
        $comment = $notification->commentModel($notification->data['comment_id']);
    ?>
    
    <a href="{{ route('show', ['post_id' => $comment->post_id]) }}">
        <article class="notice-article {{ strtotime($check_at) < strtotime($notification->updated_at) ? "bg-blue-50" : "" }}">
            <div class="flex w-full">
                <div class="text-yellow-300 notice-mark">
                    <i class="fa-solid fa-comment"></i>
                </div>
                <div class="flex w-[calc(100%_-_2rem)]">
                    <div class="w-8 md:w-10">
                        @if($comment->user->profile_image)
                            <img class="notice-user-image" src="{{ $comment->user->profile_image }}" alt="プロフィール画像" />
                        @else
                            <img class="notice-user-image" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                        @endif
                    </div>
                    <div class="ml-2 w-[calc(100%_-_2.5rem)]">
                        <div class="font-bold overflow-x-auto no-bar text-sm md:text-base">
                            <h3>{{ $comment->user->name }}</h3>
                        </div>
                        <ul class="flex items-center overflow-x-auto whitespace-nowrap h-4 no-bar">
                            @foreach ($comment->user->usertags as $usertag)
                                <li class="text-link mr-1 text-xs md:text-sm">#{{ $usertag->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full mt-2">
                <p>{!! nl2br($comment->content) !!}</p>
            </div>
            
            @include('parts.post_images', ['post' => $comment])
            
            <div class="mt-2">
                <p class="text-gray-500 text-sm">{!! nl2br($comment->post->content) !!}</p>
                <p class="text-gray-500 text-sm mt-1">{{ $comment->post->image1 ? ($comment->post->image2 ? ($comment->post->image3 ? ($comment->post->image4 ? "[添付画像4枚]" : "[添付画像3枚]") : "[添付画像2枚]") : "[添付画像1枚]") :"" }}</p>
            </div>
            <small class="mt-2">{{ $notification->updated_at }}</small>
        </article>
    </a>
    
@else
@endif

