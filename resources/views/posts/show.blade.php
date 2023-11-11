<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <title>トップページ</title>
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
                  <h1 class="center-title">投稿詳細</h1>
              </div>
              <div class="center-post-info-area">
                <div class="center-post-info">
                
                  @include('parts.post_template', ['post' => $post])
                
                </div>
              </div>
              <div class="show-contents-area">
                <div class="show-list-title-area">
                  <a href="{{ route('show', ['post_id' => $post->id]) }}" class="show-title show-title-comment {{ Request::routeIs('show') ? "now-show-btn-comment" : ""  }}"><i class="fa-solid fa-comment"></i> コメント一覧 　</a>
                  <a href="{{ route('showLikes', ['post_id' => $post->id]) }}" class="show-title show-title-like {{ Request::routeIs('showLikes') ? "now-show-btn-like" : ""  }}"><i class="fa-solid fa-heart"></i> いいね一覧 　</a>
                </div>
                @if(Request::routeIs('show'))
                  <div class="comment-create-btn-area">
                    <span id="comment-create-btn" class="comment-create-btn" onClick="commentAreaAppear()"><i id="comment-create-btn-icon" class="fa-solid fa-comment comment-create-btn-icon"></i> コメントをする</span>
                  </div>
                @endif
                <div class="center-container">
                
                  <div id="comment-create-area" class="comment-create-area hidden">
                    <div class="comment-create-header">
                      <h3><i class="fa-solid fa-comment text-yellow-400"></i> コメント投稿 　</h3>
                      <div class="comment-create-remove-btn" onClick="commentAreaAppear()">
                        <i class="fa-solid fa-xmark"></i>
                      </div>
                    </div>
                    <form class="create-form" action="/comments" method="POST" enctype="multipart/form-data">
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
                      <input type="hidden" name="comment[user_id]" value="{{ Auth::id() }}">
                      <input type="hidden" name="comment[post_id]" value="{{ $post->id }}">
                      <textarea id="content" class="create-body" rows="3" name="comment[content]" placeholder="コメントで投稿を盛り上げよう！">{{ old('comment.content') }}</textarea>
                      <div class="text-count-area">
                        <p id="text-count-message">現在 <span id="text-count" class="text-count">0</span>文字 / 150文字</p>
                      </div>
                      <div class="create-image-area">
                        <label class="create-image-label" for="image">○画像を4枚まで添付することができます○
                        </label>
                        <input class="create-image" type="file" id="image" name="image[]" accept="image/*" multiple onChange="imagesTooMany()" />
                      </div>
                      <input class="create-submit" type="submit" value="投稿" onclick="return commentFormCheck()" />
                    </form>
                  </div>
                
                  <div class="center-post-list-area">
                    @if(Request::routeIs('show'))
                      @if(count($comments) == 0)
                          <p class="post-nothing">まだコメントはありません。</p>
                      @endif
                      @foreach($comments as $comment)
                        
                        @include('parts.comment_template', ['comment' => $comment])
                        
                      @endforeach
                      <div class="paginate paginate-style">{{ $comments->links() }}</div>
                    @else
                      @if(count($users) == 0)
                          <p class="post-nothing">まだいいねをしたユーザーはいません。</p>
                      @endif
                      @foreach($users as $user)
                        
                        @include('parts.list_user_profile', ['user' => $user])
                        
                      @endforeach
                      <div class="paginate paginate-style">{{ $users->links() }}</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </main>
          <aside class="side-bar"></aside>
        </div>
      </div>
      
      <script src="{{ asset('js/formCheck.js') }}"></script>
      <script src="{{ asset('js/deleteConfirm.js') }}"></script>
      <script src="{{ asset('js/strCount/comment.js') }}"></script>
      <script src="{{ asset('js/textareaHeight.js') }}"></script>
      <script src="{{ asset('js/commentCreateAppear.js') }}"></script>
      <script src="{{ asset('js/postMenuAppear.js') }}"></script>
      <script src="{{ asset('js/like.js') }}" type="module"></script>
      
    </body>
  </x-app-layout>
</html>