<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'category_id',
        'repost_id',
        'reply_to',
        'content',
        'image1',
        'image2',
        'image3',
        'image4',
        'is_big_post',
    ];
    
    //ここからリレーション設定
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function likes() {
        return $this->hasMany(Like::class);
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
    public function posttags() {
        return $this->belongsToMany(Posttag::class, 'post_posttags', 'post_id', 'posttag_id');
    }
    
    //SQL抽出
    
    public function getPaginateByLimit(int $limit_count = 20)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //利用中のユーザーがポストをいいねしているかの判定
    public function is_liked_by_auth_user() {
        $like_users = array();
        foreach($this->likes as $like) {
            array_push($like_users, $like->user_id);
        }
        if(in_array(Auth::id(), $like_users)) {
            return true;
        } else {
            return false;
        }
    }
}
