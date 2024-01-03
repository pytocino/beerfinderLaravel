<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\User;
use App\Models\Beer;
use App\Models\Beerlocal;
use Illuminate\Support\Facades\DB;

class LocalController extends Controller
{
    public function getLocalsByName()
    {
        $name = request('name');
        $locals = Local::join('beerlocals', 'locals.id', '=', 'beerlocals.local_id')
            ->join('beers', 'beerlocals.beer_id', '=', 'beers.id')
            ->where('beers.name', $name)
            ->paginate(10); // Change the number to the desired pagination limit

        return view('locals', compact('locals', 'name'));
    }
}
