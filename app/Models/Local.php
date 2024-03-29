<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'description',
        'email',
        'phone',
        'image',
        'address',
        'latitude',
        'longitude',
        'city',
        'region',
        'website',
        'verified',
    ];

    public function beers()
    {
        return $this->belongsToMany(Beer::class, 'beerlocals');
    }
}
