<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_name',
        'name',
        'message',
        'profile_image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //ここからリレーション設定
    public function usertags() {
        return $this->belongsToMany(Usertag::class, 'user_usertags', 'user_id', 'usertag_id');
    }
    
    public function followers() {
        return $this->belongsToMany(Self::class, 'follows', 'followed_id', 'follower_id');
    }
    
    public function followeds() {
        return $this->belongsToMany(Self::class, 'follows', 'follower_id', 'followed_id');
    }
    
    public function posts() {
        return $this->hasMany(Post::class, 'user_id');
    }
    
    public function likes() {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
    }
    
    public function mains() {
        return $this->hasMany(Main::class);
    }
    
    public function stores() {
        return $this->hasMany(Store::class);
    }
    
    public function categories() {
        return $this->hasMany(Category::class);
    }
    
    //利用中のユーザーが指定のユーザーをフォローしているかの判定
    public function is_followed_by_auth_user() {
        $followers = array();
        foreach($this->followers as $follower) {
            array_push($followers, $follower->id);
        }
        if(in_array(Auth::id(), $followers)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function makeLinkUsertag($usertag) {
        //ユーザータグをリンク化
        return '<a href="/users/filter?keyword=%23'. $usertag. '" class="hyper-link">#'. $usertag. '</a>';
    }
    
    public function makeLinkText($text) {
        //検索キーワードにユーザータグがあれば青くする
        $pattern_tag = '/(#[a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u';
        $replace_tag = '<span class="text-[#1d9bf0]">$1</span>';
        return preg_replace($pattern_tag, $replace_tag, $text);
    }
}
