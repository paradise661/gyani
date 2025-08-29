<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageVisa extends Model
{
    use HasFactory;

    protected $table = 'package_visa'; // explicitly set table name

    protected $fillable = [
        'question',
        'answer',
        'order',
        'package_id'
    ];
}
