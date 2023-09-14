<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
    ];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    public function mains() {
        return $this->hasMany(Main::class);
    }
}
