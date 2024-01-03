<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Beer;
use Illuminate\Pagination\Paginator;


class LocalController extends Controller
{
    public function getLocalsByName()
    {
        $name = request('name'); // El nombre de la marca de cerveza que estás buscando
        $beer = Beer::where('name', $name)->first(); // Buscamos la cerveza por el nombre

        $locals = Local::select('locals.*')
            ->join('beerlocals', 'locals.id', '=', 'beerlocals.local_id')
            ->join('beers', 'beerlocals.beer_id', '=', 'beers.id')
            ->where('beers.id', $beer->id)
            ->paginate(2);
        return view('locals', ['locals' => $locals, 'name' => $name]);
    }
}
