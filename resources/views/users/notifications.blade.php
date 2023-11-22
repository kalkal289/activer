<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <title>通知</title>
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
                            <h1 class="center-title">通知</h1>
                        </div>
                        <div class="center-container">
                            <div class="center-contents-area">
                                @if(count($notifications) == 0)
                                    <p class="post-nothing">まだ通知はありません</p>
                                @endif
                                    @foreach($notifications as $notification)
                                      
                                      @include('parts.notification_template', ['notification' => $notification])
                                      
                                    @endforeach
                                <div class="paginate paginate-style">{{ $notifications->links() }}</div>
                            </div>
                        </div>
                    </div>
                </main>
                <div class="guide-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-circle-info"></i></div>
                <aside id="side-bar" class="side-bar">
                    <div class="guide-x-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-xmark"></i></div>
                    <div class="guide-container">
                        <h3 class="guide-title">【利用説明】</h3>
                        <h4 class="guide-sub-title">通知について</h4>
                        <ul class="guide-list">
                            <li>あなたへの通知が一覧として表示されます。</li>
                            <li>誰かがあなたをフォローした場合や、あなたの投稿にいいねやコメントをした場合にここに通知されます。</li>
                            <li>それぞれの通知を押すことで、通知内容に関連したページに飛ぶことができます。</li>
                            <li>未確認の通知は全体が青く表示されます。</li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </body>
  </x-app-layout>
</html>