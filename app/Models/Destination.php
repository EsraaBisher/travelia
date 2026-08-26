<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'duration',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}