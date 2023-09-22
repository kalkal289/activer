<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Usertag;
use App\Models\User;
use App\Models\Comment;
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
    
    public function store(Post $post, Request $request) {
        $input = $request['post'];
        $input += ['user_id' => Auth::user()->id];
        $images = $request->file('image');
        for($i = 0; $i < count($images); $i++) {
            $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
            $input += ['image'.($i + 1) => $image_url];
        }
        $post->fill($input)->save();
        return redirect('/'); 
    }
    
    public function show(Post $post) {
        return view('posts.show')->with(['post' => $post]);
    }
}
