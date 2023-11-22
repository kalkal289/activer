<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'type',
        'data',
        'group_key',
    ];
    
    protected $casts = [
        'data'  => 'json',
    ];
    
    //ここからリレーション設定
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    //引数の配列のIDを持つユーザーモデルを配列で返す
    public function userModel($user_id) {
        return User::find($user_id);
    }
    
    //引数の配列のIDを持つユーザーモデルを配列で返す
    public function userModels($user_ids) {
        return User::findMany($user_ids);
    }
    
    //引数のIDを持つポストモデルを返す
    public function postModel($post_id) {
        return Post::find($post_id);
    }
    
    //引数のIDを持つコメントモデルを返す
    public function commentModel($comment_id) {
        return Comment::find($comment_id);
    }
}
