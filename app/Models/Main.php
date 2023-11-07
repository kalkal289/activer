<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Main extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'image1',
        'image2',
        'image3',
        'image4',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function makeLink($text) {
        //URLをリンク化
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1" class="hyper-link" target="_blank">$1</a>';
        return preg_replace($pattern, $replace, $text);
    }
    
    public function makeLinkUsertag($usertag) {
        //ユーザータグをリンク化
        return '<a href="/users/filter?keyword=%23'. $usertag. '" class="hyper-link">#'. $usertag. '</a>';
    }
}
