<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_id',
        'name',
        'itinerary_id',
    ];

    public function icon()
    {
        return $this->hasOne(Icon::class, 'id', 'icon_id');
    }
}
