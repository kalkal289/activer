<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // only()の引数内のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like']);
    }
    
    function like(Request $request) {
        $user_id = Auth::id();
        $post_id = $request->post_id;
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if(!$already_liked) {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);
        } else {
            Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        }
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param);
        
    }
}
