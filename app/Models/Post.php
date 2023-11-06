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
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
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
        return $this::with('user', 'category')->withCount('likes')->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    //利用中のユーザーがポストをいいねしているかの判定
    public function is_liked_by_auth_user() {
        $like_users = array();
        foreach($this->likes as $like) {
            array_push($like_users, $like->id);
        }
        if(in_array(Auth::id(), $like_users)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function makeLinkPost($text) {
        //URLをリンク化
        $pattern_url = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace_url = '<a href="$1" class="hyper-link" target="_blank">$1</a>';
        $text = preg_replace($pattern_url, $replace_url, $text);
        
        //ポストタグをリンク化
        $pattern_tag = '/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u';
        $replace_tag = '<a href="/posts/filter?keyword=%23$1" class="hyper-link">#$1</a>';
        return preg_replace($pattern_tag, $replace_tag, $text);
    }
    
    public function makeLinkUsertag($usertag) {
        //ユーザータグをリンク化
        return '<a href="/users/filter?keyword=%23'. $usertag. '" class="hyper-link">#'. $usertag. '</a>';
    }
}
