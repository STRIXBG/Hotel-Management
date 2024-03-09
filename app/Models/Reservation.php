<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_id',
        'start_date',
        'end_date',
        'user_id',
    ];

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
