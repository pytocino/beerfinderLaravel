<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $cerves = Beer::all();
        $locales = Local::all()->sortBy('name');
        $beers = Beer::all();
        $user = Auth::user();
        $locals = DB::table('locals')
            ->where('user_id', $user->id)
            ->get();

        $locals = Local::with('beers')->where('user_id', $user->id)->get();
        return view('dashboard', ['locals' => $locals, 'beers' => $beers, 'user' => $user, 'locales' => $locales, 'cerves' => $cerves]);
    }

    public function agregarCerveza(Request $request)
    {
        $localId = $request->input('local_id');
        $beerId = $request->input('beer_id');

        $local = Local::find($localId);
        $local->beers()->syncWithoutDetaching([$beerId]);

        return redirect()->back()->with('success', 'Cerveza añadida exitosamente');
    }

    public function eliminarCerveza(Request $request)
    {
        $localId = $request->input('local_id');
        $beerId = $request->input('beer_id');

        $local = Local::find($localId);
        $local->beers()->detach($beerId);

        return redirect()->back();
    }

    public function mostrarFormularioEliminar(Request $request, $localId)
    {
        $local = Local::find($localId);
        $beersAssociated = $local->beers()->get();

        return view('dashboard', ['local' => $local, 'beers' => $beersAssociated]);
    }

    public function updateLocal(Request $request, $id)
    {
        // Encuentra el local por su ID
        $local = Local::findOrFail($id);

        // Actualiza los datos del local con los valores del formulario
        $local->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'description' => $request->input('description'),
            'website' => $request->input('website'),
            'city' => $request->input('city'),
            'region' => $request->input('region'),
            'verified' => $request->input('verified'),
        ]);

        // Maneja la actualización de la imagen si se ha cargado una nueva
        if ($request->file('imagen')) {
            $request->validate([
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            // Procesa y guarda la imagen
            $imagePath = $request->file('imagen')->store('images', ['disk' => 'public']);
            $local->image = $imagePath;
        }
        $local->save();

        // Redirecciona o devuelve una respuesta apropiada (puede ser una redirección a la misma página)
        return redirect()->back()->with('success', 'Local actualizado exitosamente');
    }

    public function updateBeer(Request $request, $id)
    {
        $cerve = Beer::findOrFail($id);

        $cerve->update([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'graduation' => $request->input('graduation'),
            'taste' => $request->input('taste'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'region' => $request->input('region'),
        ]);

        if ($request->file('imagen')) {
            $request->validate([
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            // Procesa y guarda la imagen
            $imagePath = $request->file('imagen')->store('images', ['disk' => 'public']);
            $cerve->image = $imagePath;
        }

        $cerve->save();

        return redirect()->back()->with('success', 'Cerveza actualizada exitosamente');
    }


    public function deleteLocal($id)
    {
        // Encuentra el local por su ID
        $local = Local::findOrFail($id);

        // Elimina el local
        $local->delete();

        // Redirecciona o devuelve una respuesta apropiada (puede ser una redirección a la misma página)
        return redirect()->back()->with('success', 'Local eliminado exitosamente');
    }
}
