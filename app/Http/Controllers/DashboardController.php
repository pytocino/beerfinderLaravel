<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $locals = DB::table('locals')
            ->where('user_id', $user->id)
            ->get();
        return view('dashboard', ['locals' => $locals]);
    }
}
