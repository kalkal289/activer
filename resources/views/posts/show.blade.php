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
                <div class="follow-list-title-area">
                  <h2 class="comment-list-title"><i class="fa-solid fa-comment"></i> コメント 　</h2>
                </div>
              </div>
              <div class="comment-create-btn-area">
                <span id="comment-create-btn" class="comment-create-btn" onClick="commentAreaAppear()"><i id="comment-create-btn-icon" class="fa-solid fa-comment comment-create-btn-icon"></i> コメントをする</span>
              </div>
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
                  @if(count($comments) == 0)
                      <p class="post-nothing">まだコメントはありません。</p>
                  @endif
                  @foreach($comments as $comment)
                    <article class="comment">
                      <div class="post-header">
                        
                        @include('parts.post_profile', [
                        'post' => $comment,
                        'is_post' => 'on',
                        ])
                        
                        @if($comment->user_id == Auth::id())
                          <div class="post-menu" onmouseleave="commentMenuHidden({{ $comment->id }})">
                            <div class="post-menu-btn" onclick="commentMenuAppear({{ $comment->id }})">
                              <i class="fa-solid fa-ellipsis"></i>
                            </div>
                            <ul id="comment-menu-list{{ $comment->id }}" class="post-menu-list">
                              <li>
                                <form action="/comments/{{ $comment->id }}" id="deleteComment{{ $comment->id }}" method="post">
                                @csrf 
                                @method('DELETE') 
                                  <button class="delete-btn" type="button" onClick="deleteComment({{ $comment->id }})">削除</button>
                                </form>
                              </li>
                            </ul>
                          </div>
                        @endif
                      </div>
                      <div class="post-body">
                          <p>
                              <a href="#">{{ $comment->content }}</a>
                          </p>
                      </div>
                      
                      @include('parts.post_images', ['post' => $comment])
                      
                      <div class="comment-info">
                        <small>投稿日: {{ $comment->created_at }}</small>
                      </div>
                    </article>
                  @endforeach
                  <div class="paginate paginate-style">{{ $comments->links() }}</div>
                </div>
              </div>
            </div>
          </main>
          <aside class="side-bar"></aside>
        </div>
      </div>
      
      <script src="{{ asset('js/formCheck.js') }}"></script>
      <script src="{{ asset('js/deleteConfirm.js') }}"></script>
      <script src="{{ asset('js/commentStrCount.js') }}"></script>
      <script src="{{ asset('js/textareaHeight.js') }}"></script>
      <script src="{{ asset('js/commentCreateAppear.js') }}"></script>
      <script src="{{ asset('js/postMenuAppear.js') }}"></script>
      <script src="{{ asset('js/like.js') }}" type="module"></script>
      
    </body>
  </x-app-layout>
</html>