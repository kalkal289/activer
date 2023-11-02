<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; //画像アップロード

class PostController extends Controller
{
    public function index(Post $post) {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function create(Category $category) {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(Post $post, PostRequest $request) {
        $input = $request['post'];
        
        //本文のURLをaタグに置換
        $content = $request['content'];
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1" class="hyper-link" target="_blank">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        $input += ['content' => $content];
        
        //添付画像をアップロードしURLを取得
        if($request->file('image')) {
            $images = $request->file('image');
            for($i = 0; $i < count($images) && $i < 4; $i++) {
                $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
                $input += ['image'.($i + 1) => $image_url];
            }
        }
        $post->fill($input)->save();
        return redirect('/'); 
    }
    
    public function show($post_id) {
        $post = Post::withCount('likes')->find($post_id);
        return view('posts.show')->with([
            'post' => $post,
            'comments' => Comment::where('post_id', $post_id)->orderBy('created_at', 'DESC')->paginate(20),
        ]);
    }
    
    public function delete(Post $post) {
        $post->delete();
        return redirect('/');
    }
    
    public function search() {
        return view('posts.search');
    }
    
    //「フォロー中」を押したときの関数
    public function followeds() {
        $query = Post::query();
        $auth_id = Auth::id();
        $followeds = User::find($auth_id)->followeds()->get();
        $followeds_id = [];
        foreach($followeds as $followed) {
            array_push($followeds_id, $followed->id);
        }
        $query->whereIn('user_id', $followeds_id);
        $posts = $query->withCount('likes')->orderBy('created_at', 'DESC')->paginate(20);
        return view('posts.filtered')->with([
            'is_followed_user' => 'on',
            'is_big_post' => '',
            'keyword' => '',
            'posts' => $posts,
        ]);
    }
    
    //投稿を検索する関数
    public function filter(Request $request) {
        $keyword = $request['keyword'];
        $is_followed_user = $request['is_followed_user'];
        $is_big_post = $request['is_big_post'];
        
        //何も入力せず検索するとトップページに飛ぶようにする
        if(!($is_followed_user || $is_big_post || $keyword)) {
            return redirect('/');
        }
        
        //ここから絞り込み処理
        $query = Post::query();
        if($is_followed_user) {
            $auth_id = Auth::id();
            $followeds = User::find($auth_id)->followeds()->get();
            $followeds_id = [];
            foreach($followeds as $followed) {
                array_push($followeds_id, $followed->id);
            }
            $query->whereIn('user_id', $followeds_id);
        }
        if($is_big_post) {
            $query->where('is_big_post', 1);
        }
        if($keyword) {
            $spaceConversion = mb_convert_kana($keyword, 's');
            $keywordArray = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($keywordArray as $word) {
                $query->where('content', 'like', '%'.$word.'%');
            }
        }
        $posts = $query->withCount('likes')->orderBy('created_at', 'DESC')->paginate(20);
        return view('posts.filtered')->with([
            'is_followed_user' => $is_followed_user,
            'is_big_post' => $is_big_post,
            'keyword' => $keyword,    
            'posts' => $posts,
        ]);
    }
}
