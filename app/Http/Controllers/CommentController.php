<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest; 
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
        return redirect('/posts/'. $comment->post_id); 
    }
    
    public function delete(Comment $comment) {
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect('/posts/'. $post_id);
    }
}
