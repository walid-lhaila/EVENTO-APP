<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'date', 'price', 'siege', 'type_reserve', 'image', 'adress', 'user_id', 'category_id'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function remainingSeats()
    {
        $totalSeats = $this->siege;
        $reservedSeats = $this->reservations()->sum('person');

        return max(0, $totalSeats - $reservedSeats);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
