<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // only()の引数内のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    //引数のIDに基づくポストをいいねする
    function like($post_id) {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $post_id,
        ]);
        
        return redirect()->back();
    }
    
    //引数のIDに基づくポストのいいねを解除する
    function unlike($post_id) {
        $like = Like::where('user_id', Auth::id())->where('post_id', $post_id)->first();
        $like->delete();
        return redirect()->back();
    }
}
