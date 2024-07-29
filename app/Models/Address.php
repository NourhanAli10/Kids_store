<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'street',
        'building',
        'floor',
        'apartment',
        'type',
        'region_id',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
