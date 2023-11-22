<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checktime extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'check_at',
    ];
    
    //ここからリレーション設定
    
    public function user() {
        return $this->hasOne(User::class);
    }
}
