<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="w-1/2 mx-auto">
                <h1>投稿詳細</h1>
                <div class="my-4">
                    <a href="/" class="my-4 p-4 rounded border-2 border-black">戻る</a>
                </div>
                <div class='posts'>
                    <div class="border rounded mt-6 p-4 {{ ($post->is_big_post == 0) ? "border-black" : "border-yellow-600" }}">
                        <div class="flex justify-between mx-auto mb-2">
                            <div>
                                <div>
                                    <a href="/mypages/{{ $post->user_id }}" class="flex">
                                        <div class="w-10 h-10 border border-black rounded-full">
                                            @if($post->user->profile_image)
                                                <img src="{{ $post->user->profile_image }}" alt="プロフィール画像"/>
                                            @else
                                                <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                            @endif
                                        </div>
                                        <h2 class='user-name'>{{ $post->user->name }}</h2>
                                    </a>
                                </div>
                                <div>
                                    @foreach ($post->user->usertags as $usertag)
                                        <span class="mr-4 text-blue-400 text-sm">#{{ $usertag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @if($post->user_id == Auth::id())
                                <div>
                                    <form action="/posts/{{ $post->id }}" id="deletePost{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onClick="deletePost({{ $post->id }})" class="z-10 p-2 border border-black">削除</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        @if($post->is_big_post == 1)
                            <small>【ビッグポスト】</small>
                        @endif
                        <p class='body border-y border-black p-2 mb-2'>{{ $post->content }}</p>
                        @if($post->image1)
                            <div class="flex overflow-x-scroll">
                                <img class="w-2/5" src="{{ $post->image1 }}" alt="画像が読み込めません。"/>
                                @if($post->image2)
                                    <img class="w-2/5 ml-4" src="{{ $post->image2 }}" alt="画像が読み込めません。"/>
                                    @if($post->image3)
                                        <img class="w-2/5 ml-4" src="{{ $post->image3 }}" alt="画像が読み込めません。"/>
                                        @if($post->image4)
                                            <img class="w-2/5 ml-4" src="{{ $post->image4 }}" alt="画像が読み込めません。"/>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        @endif
                        <!--<p class='bigpost'>bigpost: { $post->is_big_post }}</p>-->
                        <div class="flex">
                            <p class='comments p-2'>
                                <span class="inline-block p-2 border border-yellow-500 text-yellow-500">コメント: {{ $post->comments->count() }}</span>
                            </p>
                            <p class='likes p-2 ml-4'>
                                @if($post->is_liked_by_auth_user())
                                    <a class='inline-block p-2 border border-pink-500 bg-pink-500 text-white' href="/unlike/{{ $post->id }}">いいね: {{ $post->likes->count() }}</a>
                                @else
                                    <a class='inline-block p-2 border border-pink-500 text-pink-500' href="/like/{{ $post->id }}">いいね: {{ $post->likes->count() }}</a>
                                @endif
                            </p>
                        </div>
                        <small class='category block'>カテゴリー名: {{ $post->category->name }}</small>
                        <small>投稿日: {{ $post->created_at }}</small>
                        <div class="text-center mx-auto my-2">
                            <a href="/posts/{{ $post->id }}" class="inline-block w-10/12 py-2 border border-black">詳細ページへ</a>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <form class="flex flex-col text-center w-3/5 mx-auto border border-black rounded p-4" action="/comments" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-red-600 mb-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p id="error-txt" class="text-red-600"></p>
                            <input type="hidden" name="comment[user_id]" value="{{ Auth::id() }}">
                            <input type="hidden" name="comment[post_id]" value="{{ $post->id }}">
                            <textarea id="content" column="10" name="comment[content]" placeholder="コメントで投稿を盛り上げよう！">{{ old('comment.content') }}</textarea>
                            <label for="image">4枚まで画像を添付することができます。</label>
                            <input type="file" id="image" name="image[]" accept="image/*" multiple onChange="imagesTooMany()">
                            <input type="submit" value="投稿" onclick="return postFormCheck()" class="p-4 text-center border-2 border-black">
                        </form>
                    </div>
                    
                    <div class='mt-6 mx-auto border-t-2 border-black pb-6'>
                        <!--<button class="p-4 mt-4 border-2 border-black rounded">-->
                        <!--    コメントを投稿-->
                        <!--</button>-->
                        <h2 class="text-center text-xl font-bold mt-4">【コメント】</h2>
                        <div class="border-b border-black">
                            @foreach ($post->comments as $comment)
                                <div class='post border-t border-black p-2'>
                                    <div class="flex justify-between">
                                        <div>
                                            <div class="flex">
                                                <div class="w-10 h-10 border border-black rounded-full">
                                                    @if($comment->user->profile_image)
                                                        <img src="{{ $comment->user->profile_image }}" alt="プロフィール画像"/>
                                                    @else
                                                        <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h2 class='user-name'>{{ $comment->user->name }}</h2>
                                                    <div>
                                                        @foreach ($post->user->usertags as $usertag)
                                                            <span class="mr-4 text-blue-400 text-sm">#{{ $usertag->name }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($comment->user_id == Auth::id())
                                            <div>
                                                <form action="/comments/{{ $comment->id }}" id="deleteComment{{ $comment->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onClick="deleteComment({{ $comment->id }})" class="z-10 p-2 border border-black">削除</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                    <p class='body px-2'>{{ $comment->content }}</p>
                                    @if($comment->image1)
                                        <div class="flex overflow-x-scroll">
                                            <img class="w-2/5" src="{{ $comment->image1 }}" alt="画像が読み込めません。"/>
                                            @if($comment->image2)
                                                <img class="w-2/5 ml-4" src="{{ $comment->image2 }}" alt="画像が読み込めません。"/>
                                                @if($comment->image3)
                                                    <img class="w-2/5 ml-4" src="{{ $comment->image3 }}" alt="画像が読み込めません。"/>
                                                    @if($comment->image4)
                                                        <img class="w-2/5 ml-4" src="{{ $comment->image4 }}" alt="画像が読み込めません。"/>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                    <small>投稿日: {{ $comment->created_at }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
        </body>
    </x-app-layout>
</html>