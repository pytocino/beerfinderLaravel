<?php

namespace App\Http\Controllers;

use App\Models\Beer;

class BeerController extends Controller
{
    public function index()
    {
        $beernames = Beer::all()->sortby('name');
        $beers = Beer::inRandomOrder()->take(10)->get();

        return view('welcome')
            ->with('beernames', $beernames)
            ->with('beers', $beers);
    }
}
