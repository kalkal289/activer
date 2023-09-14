<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPosttag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id',
        'posttag_id',
    ];
}
