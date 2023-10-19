<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Main;
use App\Models\Store;
use App\Models\Post;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; //画像アップロード

class MypageController extends Controller
{
    function mypageMain(User $user) {
        return view('users.mypage_main')->with([
            'user' => $user,
            'mains' => Main::where('user_id', $user->id)->orderBy('updated_at', 'DESC')->get(),
            'kind' => 0,
            'keyword' => '',
        ]);
    }
    
    function mypagePost(User $user) {
        return view('users.mypage_post')->with([
            'user' => $user,
            'posts' => Post::where('user_id', $user->id)->withCount('likes')->orderBy('created_at', 'DESC')->paginate(20),
            'kind' => 1,
            'keyword' => '',
        ]);
    }
    
    function mypageBigPost(User $user) {
        return view('users.mypage_post')->with([
            'user' => $user,
            'posts' => Post::where('user_id', $user->id)->withCount('likes')->where('is_big_post', 1)->orderBy('created_at', 'DESC')->paginate(20),
            'kind' => 2,
            'keyword' => '',
        ]);
    }
    
    function mypageStore(User $user) {
        return view('users.mypage_store')->with([
            'user' => $user,
            'stores' => Store::where('user_id', $user->id)->orderBy('updated_at', 'DESC')->get(),
            'kind' => 3,
            'keyword' => '',
        ]);
    }
        
    //引数のユーザーの投稿を検索する関数
    public function filterPost(User $user, Request $request) {
        $keyword = $request['keyword'];
        
        //キーワードが入力されなければリダイレクト
        if(!($keyword)) {
            return redirect('/mypages/posts/'. $user->id);
        }
        
        //ここから絞り込み処理
        $query = Post::query();
        $query->where('user_id', $user->id);
        if($keyword) {
            $spaceConversion = mb_convert_kana($keyword, 's');
            $keywordArray = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($keywordArray as $word) {
                $query->where('content', 'like', '%'.$word.'%');
            }
        }
        $posts = $query->orderBy('created_at', 'DESC')->paginate(20);
        return view('users.mypage_post')->with([
            'keyword' => $keyword,    
            'posts' => $posts,
            'user' => $user,
            'kind' => 0,
        ]);
    }
    
    //引数のユーザーのビッグポストを検索する関数
    public function filterBigPost(User $user, Request $request) {
        $keyword = $request['keyword'];
        
        //キーワードが入力されなければリダイレクト
        if(!($keyword)) {
            return redirect('/mypages/big/'. $user->id);
        }
        
        //ここから絞り込み処理
        $query = Post::query();
        $query->where('user_id', $user->id)->where('is_big_post', 1);
        if($keyword) {
            $spaceConversion = mb_convert_kana($keyword, 's');
            $keywordArray = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($keywordArray as $word) {
                $query->where('content', 'like', '%'.$word.'%');
            }
        }
        $posts = $query->orderBy('created_at', 'DESC')->paginate(20);
        return view('users.mypage_post')->with([
            'keyword' => $keyword,    
            'posts' => $posts,
            'user' => $user,
            'kind' => 1,
        ]);
    }
    
    function likePost(User $user) {
        return view('users.like_posts')->with([
            'user' => $user,
            'posts' => $user->likes()->withPivot('created_at AS liked_at')->orderBy('liked_at', 'DESC')->paginate(20),
        ]);
    }
    
    function editProfile(User $user) {
        return view('users.profile_edit')->with(['user' => $user]);
    }
    
    function updateProfile(User $user, ProfileRequest $request) {
        $input = $request['user'];
        if($request->file('image')) {
            $image = $request->file('image');
            $image_url = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $input += ['profile_image' => $image_url];
        }
        $user->fill($input)->save();
        return redirect('mypages/'. $user->id);
    }
}
