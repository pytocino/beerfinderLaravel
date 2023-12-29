<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
        return view('recom', ['beers' => Beer::all()]);
    }
}
