<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;
    public function locals()
    {
        return $this->belongsToMany(Local::class, 'beerlocals');
    }

    protected $fillable = [
        'name',
        'description',
        'image',
        'type',
        'country',
        'city',
        'region',
        'graduation',
        'color',
        'taste',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
