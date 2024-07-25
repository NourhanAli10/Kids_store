<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
    ];


    public function product_size() {
        return $this->belongsToMany(Product::class, 'product_variants')->withTimestamps();
    }
}
