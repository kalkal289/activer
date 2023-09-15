<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'user_name',
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
        return $this->hasMany(Post::class);
    }
    
    public function likes() {
        return $this->hasMany(Like::class);
    }
    
    public function mains() {
        return $this->hasMany(Main::class);
    }
    
    public function stores() {
        return $this->hasMany(Store::class);
    }
}
