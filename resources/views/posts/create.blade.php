<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>投稿</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-pen"></i> 投稿 　</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    <form class="create-form" action="/posts" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger create-alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <input type="hidden" name="post[user_id]" value="{{ Auth::id() }}">
                                        <textarea id="post-content" class="create-body" rows="4" name="post[content]" placeholder="今日何してた？">{!! old('post.content') !!}</textarea>
                                        <div class="text-count-area">
                                            <p id="text-count-message">現在 <span id="text-count" class="text-count">0</span>文字 / 300文字</p>
                                        </div>
                                        <select class="create-select" name="post[category_id]">
                                            @foreach ($categories as $category)
                                                <option value={{ $category->id }}>{{ $category->name }}</option>
                                            @endforeach
                                            <option value="">カテゴリーなし</option>
                                        </select>
                                        <div class="category-setting-btn-area">
                                            <span class="category-setting-btn" onClick="jumpConfirm()">マイカテゴリー設定</span>
                                        </div>
                                        <div class="big-post-check">
                                            <input id="create-bigpost-check" class="create-bigpost-check" type="checkbox" name="post[is_big_post]" value=1>
                                            <label for="create-bigpost-check">ビッグポスト</label>
                                        </div>
                                        <div class="create-image-area">
                                            <label class="create-image-label" for="image">○画像を4枚まで添付することができます○</label>
                                            <input class="create-image" type="file" id="image" name="image[]" accept="image/*" multiple onChange="imagesTooMany()">
                                        </div>
                                        <input class="create-submit" type="submit" value="投稿" onclick="return postFormCheck()">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                    <aside class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/postStrCount.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>