<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'storecategory_id',
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
    
    public function storecategory() {
        return $this->belongsTo(Storecategory::class);
    }
}
