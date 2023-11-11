<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>メインコンテンツ編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <div class="center-title-area main-border-color">
                                <h1 class="center-title main-text-color"><i class="fa-solid fa-star"></i> メインコンテンツ編集 　</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    <form class="create-form" action="{{ route('updateMain', ['main' => $main->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
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
                                        <input id="title" class="create-main-title" type="text" name="main[title]" placeholder="タイトル" value="{{ (old('main.title')) ? old('main.title') : $main->title }}">
                                        <div class="text-count-area">
                                            <p id="title-count-message">現在 <span id="title-count" class="text-count">0</span>文字 / 50文字</p>
                                        </div>
                                        <textarea id="content" class="create-main-body" rows="4" name="main[content]" placeholder="メインコンテンツの内容を書きましょう！">{{ (old('main.content')) ? old('main.content') : $main->content }}</textarea>
                                        <div class="text-count-area">
                                            <p id="text-count-message">現在 <span id="text-count" class="text-count">0</span>文字 / 500文字</p>
                                        </div>
                                        <select class="create-main-select" name="main[category_id]">
                                            @foreach ($categories as $category)
                                                <option value={{ $category->id }} {{ ($category->id == $main->category_id) ? "selected" : "" }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="create-main-image-area">
                                            <label class="create-image-label" for="image">○画像を4枚まで添付することができます○</label>
                                            @if($main->image1)
                                                <label class="create-image-label" for="image">※ファイルを選択しない場合、変更前の画像が受け継がれます。</label>
                                            @endif
                                            <input class="create-image" type="file" id="image" name="image[]" accept="image/*" multiple onChange="imagesTooMany()" />
                                        </div>
                                        <input class="create-main-submit" type="submit" value="作成" onclick="return contentFormCheck()" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                    <aside class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/strCount/contents.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>