<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // only()の引数内のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like']);
    }
    
    function like(Post $post) {
        $user_id = Auth::id();
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post->id)->first();
        if(!$already_liked) {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post->id,
            ]);
            
            //通知を登録
            if($user_id != $post->user_id) {
                $user_ids = [$user_id];
                $group_key = 'like_'. $post->id. '_'. now()->format('Ymd');
                $like_group = Notification::where('group_key', $group_key)->first();
                if($like_group) {
                    if(!in_array($user_id, $like_group->data['like_users'], true)) {
                        $user_ids = array_merge($user_ids, $like_group->data['like_users']);
                        $like_group->data = [
                            'post_id' => $post->id,
                            'like_users' => $user_ids,
                            'like_count' => count($user_ids),
                        ];
                        $like_group->save();
                    }
                } else {
                    Notification::create([
                        'user_id' => $post->user_id,
                        'type' => 'like',
                        'data'  => [
                            'post_id' => $post->id,
                            'like_users' => $user_ids,
                            'like_count' => 1,
                        ],
                        'group_key' => $group_key,
                    ]);
                }
            }
            
        } else {
            Like::where('user_id', $user_id)->where('post_id', $post->id)->delete();
        }
        $post_likes_count = Post::withCount('likes')->findOrFail($post->id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param);
        
    }
}
