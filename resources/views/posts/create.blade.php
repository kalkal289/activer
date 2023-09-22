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
            <h1>投稿</h1>
            <div class="form-area">
                <form class="flex flex-col text-center w-2/5 mx-auto" action="/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea column="10" name="post[content]" placeholder="今日何してた？"></textarea>
                    <div class="flex text-right">
                        <input type="checkbox" name="post[is_bigpost]" value="1">
                        <label>ビッグポスト</label>
                    </div>
                    <select name="post[category_id]">
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label for="image">4枚まで画像を添付することができます。</label>
                    <input type="file" id="image" name="image[]" accept="image/*" multiple onchange="tooManyImages()">
                    <input type="submit" value="投稿" class="p-4 text-center border-2 border-black">
                    
                </form>
            </div>
            <script src="{{ asset('js/image.js') }}"></script>
        </body>
    </x-app-layout>
</html>