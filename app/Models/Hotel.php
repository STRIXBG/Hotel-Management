<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {

    use HasFactory;

    protected $table = 'hotels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'city_id',
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function rooms() {
        return $this->hasMany(Room::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
