<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use App\Http\Requests\CommentRequest; 
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; //画像アップロード

class CommentController extends Controller
{
    public function comment(Comment $comment, CommentRequest $request) {
        $input = $request['comment'];
        if($request->file('image')) {
            $images = $request->file('image');
            for($i = 0; $i < count($images); $i++) {
                $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
                $input += ['image'. ($i + 1) => $image_url];
            }
        }
        $comment->fill($input)->save();
        
        //通知を登録
        $post = Post::find($input['post_id']);
        if(Auth::id() != $post->user_id) {
            Notification::create([
                'user_id' => $post->user_id,
                'type' => 'comment',
                'data'  => [
                    'comment_id' => $comment->id,
                    'post_id' => $post->id,
                ],
                'group_key' => 'comment_'. $comment->id,
            ]);
        }
        
        return redirect('/posts/'. $comment->post_id); 
    }
    
    public function delete(Comment $comment) {
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect('/posts/'. $post_id);
    }
}
