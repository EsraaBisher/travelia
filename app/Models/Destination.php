<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
   protected $fillable = [
    'name',
    'duration',
    'description',
    'price',
    'location',
    'image',
];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}