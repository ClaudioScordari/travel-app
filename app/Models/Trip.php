<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'img_destination',
        'departure_date',
        'arrival_date',
        'num_people',
        'transport',
        'price',
        'reservation',
        'food',
        'notes',
        'travel_completed'
    ];

    // Relationships
    public function places ()
	{
		return $this->hasMany(Place::class);
	}
}
