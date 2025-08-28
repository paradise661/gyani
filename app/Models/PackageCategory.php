<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'order',
        'status',
        'description',
        'short_description',

        'seo_title',
        'meta_description',
        'meta_keywords',
        'seo_schema',
    ];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'applied_categories', 'category_id', 'package_id');
    }
}
