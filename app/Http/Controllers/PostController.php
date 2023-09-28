<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
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
    
    public function show(Post $post) {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function delete(Post $post) {
        $post->delete();
        return redirect('/');
    }
}
