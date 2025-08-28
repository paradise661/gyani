<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'country', 'traveldate', 'adults', 'childs', 'departure_city', 'duration', 'pageurl', 'message'];
}
