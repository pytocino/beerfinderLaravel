<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Visit;

class BeerController extends Controller
{
    public function index()
    {
        $beernames = Beer::all()->sortby('name');
        $beers = Beer::inRandomOrder()->take(10)->get();
        $visit = Visit::firstOrNew([]);
        $visit->count++;
        $visit->save();
        $visitCount = $visit->count;

        return view('welcome')
            ->with('beernames', $beernames)
            ->with('beers', $beers)
            ->with('visitCount', $visitCount);
    }
}
