<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
        'status',
        'slug',
        'created_by',
    ];
    
    public function createdBy() {
        return $this->belongsTo(User::class, "created_by");
    }
}
