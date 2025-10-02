<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'price', 'quantity', 'event_id'];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
