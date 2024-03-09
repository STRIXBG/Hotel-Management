<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';
    protected $primaryKey = 'id';
    
    use HasFactory;
}
