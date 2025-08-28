<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFaq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'order',
        'package_id'
    ];
}
