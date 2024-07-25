<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Size;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'image',
        'status',
        'category_id',
        'brand_id',
        'slug',
        'code',
        'created_by'
    ];



    ############### Relations ###############

    public function colors() {
        return $this->belongsToMany(Color::class, 'product_variants')->withTimestamps();
    }


    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_variants')->withTimestamps();
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }


    public function reviews() {
        return $this->hasMany(Review::class);
    }




}
