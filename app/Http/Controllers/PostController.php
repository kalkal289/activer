<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Posttag;
use App\Models\PostPosttag;
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
        return view('posts.create')->with(['categories' => $category->where('user_id', Auth::id())->get()]);
    }
    
    public function store(Post $post, PostRequest $request) {
        $input = $request['post'];
        
        //添付画像をアップロードしURLを取得
        if($request->file('image')) {
            $images = $request->file('image');
            for($i = 0; $i < count($images) && $i < 4; $i++) {
                $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
                $input += ['image'.($i + 1) => $image_url];
            }
        }
        
        //投稿の保存
        $post->fill($input)->save();
        
        //ポストタグの紐づけ
        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $input['content'], $tags);
        foreach($tags[1] as $tag) {
            Posttag::firstOrCreate(['name' => $tag]);
            $posttag = Posttag::where('name', $tag)->first();
            if(!PostPosttag::where('post_id', $post->id)->where('posttag_id', $posttag->id)->exists()) {
                $post->posttags()->attach($posttag->id);
            }
        }
        return redirect('/'); 
    }
    
    public function show($post_id) {
        $post = Post::withCount('likes')->find($post_id);
        return view('posts.show')->with([
            'post' => $post,
            'comments' => Comment::where('post_id', $post_id)->orderBy('created_at', 'DESC')->paginate(20),
        ]);
    }
    
    public function showLikes($post_id) {
        $post = Post::withCount('likes')->find($post_id);
        return view('posts.show')->with([
            'post' => $post,
            'users' => $post->likes()->withPivot('created_at AS liked_at')->orderBy('liked_at', 'desc')->paginate(30),
        ]);
    }
    
    public function delete(Post $post) {
        $post->delete();
        return redirect()->back();
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
                if(substr($word, 0, 1) == '#') {
                    $tag_word = substr($word, 1);
                    $query->whereHas('posttags', function ($query) use ($tag_word) {
                        $query->where('name', 'like', '%' .$tag_word. '%');
                    });
                } else {
                    $query->where(function($query) use ($word) {
                        $query->where('content', 'like', '%'.$word.'%');
                    });
                }
            }
        }
        $posts = $query->withCount('likes')->orderBy('created_at', 'DESC')->paginate(20);
        
        //キーワード内のタグを青色にする
        $pattern_tag = '/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u';
        $replace_tag = '<span class="text-link">#$1</span>';
        $newKeyword = preg_replace($pattern_tag, $replace_tag, $keyword);
        
        return view('posts.filtered')->with([
            'is_followed_user' => $is_followed_user,
            'is_big_post' => $is_big_post,
            'keyword' => $keyword,    
            'posts' => $posts,
            'new_keyword' => $newKeyword,
        ]);
    }
}
