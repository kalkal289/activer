<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>メインコンテンツ作成</title>
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
                            <div class="center-title-area main-border-color">
                                <h1 class="center-title main-text-color"><i class="fa-solid fa-star"></i> メインコンテンツ作成 　</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    <form class="create-form" action="/mains" method="POST" enctype="multipart/form-data">
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
                                        <input type="hidden" name="main[user_id]" value="{{ Auth::id() }}" />
                                        <input id="title" class="create-main-title" type="text" name="main[title]" placeholder="タイトル（必須）" value="{{ old('main.title') }}">
                                        <div class="text-count-area">
                                            <p id="title-count-message">現在 <span id="title-count" class="text-count">0</span>文字 / 50文字</p>
                                        </div>
                                        <textarea id="content" class="create-main-body" rows="4" name="main[content]" placeholder="メインコンテンツの内容を書きましょう！">{{ old('main.content') }}</textarea>
                                        <div class="text-count-area">
                                            <p id="text-count-message">現在 <span id="text-count" class="text-count">0</span>文字 / 500文字</p>
                                        </div>
                                        <select class="create-main-select" name="main[category_id]">
                                            @foreach ($categories as $category)
                                                <option value={{ $category->id }}>{{ $category->name }}</option>
                                            @endforeach
                                            <option value="">カテゴリーなし</option>
                                        </select>
                                        <div class="category-setting-btn-area">
                                            <span class="category-setting-btn" onClick="jumpConfirm()">マイカテゴリー設定</span>
                                        </div>
                                        <div class="create-main-image-area">
                                            <label class="create-image-label" for="image">○画像を4枚まで添付することができます○</label>
                                            <input class="create-image" type="file" id="image" name="image[]" accept="image/*" multiple onChange="imagesTooMany()" />
                                        </div>
                                        <input class="create-main-submit" type="submit" value="作成" onclick="return contentFormCheck()" />
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
                            <h4 class="guide-sub-title">メインコンテンツ作成方法</h4>
                            <ul class="guide-list">
                                <li>タイトルは必須で50文字までです。</li>
                                <li>本文は500文字までです。</li>
                                <li>画像は4枚まで添付することができます。</li>
                                <li>本文か画像のどちらかを入れる必要があります。</li>
                                <li>カテゴリーは、「マイカテゴリー設定」から追加、編集ができます。</li>
                                <li>URLを貼ると、投稿後に自動でリンクになります。</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/strCount/contents.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>