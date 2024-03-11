<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class Service extends Model {
    
    use HasFactory;
    
    protected $table = 'services';
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function hotels() {
        return $this->belongsToMany(Hotel::class);
    }
}
