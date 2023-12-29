<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BeerController extends Controller
{
    public function index()
    {
        $beers = Cache::remember('random_beers', now()->addWeek(), function () {
            return Beer::inRandomOrder()->limit(8)->get();
        });
        return view('welcome', compact('beers'));
    }
}
