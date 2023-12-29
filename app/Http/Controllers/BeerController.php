<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BeerController extends Controller
{
    public function index()
    {
        // todas las beers a la vista welcome
        $beernames = Beer::all();
        $beers = Beer::inRandomOrder()->take(10)->get();

        return view('welcome')
            ->with('beernames', $beernames)
            ->with('beers', $beers);
    }
}
