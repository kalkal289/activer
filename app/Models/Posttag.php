<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posttag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',    
    ];
    
    public function posts() {
        return $this->belongsToMany(Post::class, 'post_posttags', 'posttag_id', 'post_id');
    }
}
