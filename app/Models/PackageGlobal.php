<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageGlobal extends Model
{
    use HasFactory;
    protected $fillable = [
        'priceprefix',
        'priceper',
        'discount',
        'duration',
        'type',
        'size',
        'transportation',
        'activity',
        'season',
        'accomod',
        'meal',
        'package_id'
    ];
}
