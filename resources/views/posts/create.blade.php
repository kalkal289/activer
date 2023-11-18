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
                            <span class="page-back-btn" onClick="history.back()"><i class="fa-solid fa-arrow-left"></i></span>
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-pen"></i> 投稿 　</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    <form id="create-form" class="create-form" action="/posts" method="POST" enctype="multipart/form-data">
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
                                        <textarea id="post-content" class="create-body" rows="4" name="post[content]" placeholder="今日何してた？&#10;&#10;#Activer #投稿">{!! old('post.content') !!}</textarea>
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
                                        <input class="create-submit" type="submit" value="投稿" onclick="return postFormCheck();">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                    <div class="guide-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-circle-info"></i></div>
                    <aside id="side-bar" class="side-bar">
                        <div class="guide-x-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-xmark"></i></div>
                        <div class="guide-container">
                            <h3 class="guide-title">【利用説明】</h3>
                            <h4 class="guide-sub-title">投稿方法</h4>
                            <ul class="guide-list">
                                <li>本文は300文字までです。</li>
                                <li>画像は4枚まで添付することができます。</li>
                                <li>本文のみ、画像のみの投稿も可能です。</li>
                                <li>カテゴリーは、「マイカテゴリー設定」から追加、編集ができます。</li>
                                <li>「ビッグポスト」にチェックを入れることで、重要な投稿としてまとめることができます。</li>
                                <li>URLを貼ると、投稿後に自動でリンクになります。</li>
                                <li>単語の頭に「#」を付けることで、投稿タグを付けることができます。<br>例： #Activer #投稿</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/strCount/post.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>