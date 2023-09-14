<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
    //リポスト、コメント先の投稿IDのリレーションが必要かどうか
    //リポスト機能は必要か
    
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
}
