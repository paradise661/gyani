<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'map',
        'order',
        'status',
        'description',
        'short_description',
        'price',
        'destination',
        'inclusion',
        'exclusion',
        'banner_image',

        'seo_title',
        'meta_description',
        'meta_keywords',
        'seo_schema',
    ];

    public function category()
    {
        return $this->belongsToMany(PackageCategory::class, 'applied_categories', 'package_id', 'category_id');
    }

    public function globalinfo()
    {
        return $this->hasOne(PackageGlobal::class, 'package_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(GalleryPackage::class, 'package_id');
    }

    public function itenaries()
    {
        return $this->hasMany(ItenaryPackage::class, 'package_id');
    }

    public function faqs()
    {
        return $this->hasMany(PackageFaq::class, 'package_id');
    }
}
