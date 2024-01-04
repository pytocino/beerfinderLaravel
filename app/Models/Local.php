<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'description',
        'email',
        'phone',
        'image',
        'address',
        'website',
        'city',
        'region'
    ];

    public function beers()
    {
        return $this->belongsToMany(Beer::class, 'beerlocals');
    }
}
