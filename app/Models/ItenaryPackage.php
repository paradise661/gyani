<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItenaryPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'order',
        'package_id',
    ];

    public function itineraryitem()
    {
        return $this->hasMany(ItineraryItem::class, 'itinerary_id');
    }
}
