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
        //yo mando un name de beer por un formulario get
        $name = request('name');
        $locals = Local::join('beerlocals', 'locals.id', '=', 'beerlocals.local_id')
            ->join('beers', 'beerlocals.beer_id', '=', 'beers.id')
            ->where('beers.name', $name)
            ->get(['locals.*']);

        return view('locals', compact('locals', 'name'));
    }
}
