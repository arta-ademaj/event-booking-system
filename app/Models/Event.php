<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'date', 'location', 'created_by'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
