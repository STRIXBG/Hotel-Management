<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppComment extends Model
{
    use HasFactory;
    
    protected $table = 'appcomments';
    protected $fillable = [
        'title',
        'comment',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
