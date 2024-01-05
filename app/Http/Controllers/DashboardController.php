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
            'latitudee' => $request->input('latitudee'),
            'longitudee' => $request->input('longitudee'),
            'description' => $request->input('description'),
            'website' => $request->input('website'),
            'city' => $request->input('city'),
            'region' => $request->input('region'),
            'verified' => $request->input('verified'),
            'user_id' => $request->input('user_id'),
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

    public function createLocal()
    {
        return view('partials.createlocal'); // name de la vista del formulario de creación de locales
    }

    public function createLocal2()
    {
        return view('partials.createlocal2'); // name de la vista del formulario de creación de locales
    }

    public function storeLocal(Request $request)
    {
        $nuevoLocal = new Local();
        $nuevoLocal->name = $request->input('name');
        $nuevoLocal->type = $request->input('type');
        $nuevoLocal->email = $request->input('email');
        $nuevoLocal->phone = $request->input('phone');
        $nuevoLocal->address = $request->input('address');
        $nuevoLocal->latitude = $request->input('latitude');
        $nuevoLocal->longitude = $request->input('longitude');
        $nuevoLocal->description = $request->input('description');
        $nuevoLocal->website = $request->input('website');
        $nuevoLocal->city = $request->input('ciudad');
        $nuevoLocal->region = $request->input('region');
        $nuevoLocal->verified = $request->input('verified');
        $nuevoLocal->user_id = $request->input('user_id');
        $nuevoLocal->save();
        Log::info('Nuevo local creado: ' . $nuevoLocal);
        return redirect()->route('dashboard')->with('success', 'Local creado exitosamente');
    }

    public function storeLocal2(Request $request)
    {
        $nuevoLocal = new Local();
        $nuevoLocal->name = $request->input('name');
        $nuevoLocal->type = $request->input('type');
        $nuevoLocal->email = $request->input('email');
        $nuevoLocal->phone = $request->input('phone');
        $nuevoLocal->address = $request->input('address');
        $nuevoLocal->latitude = $request->input('latitude');
        $nuevoLocal->longitude = $request->input('longitude');
        $nuevoLocal->description = $request->input('description');
        $nuevoLocal->website = $request->input('website');
        $nuevoLocal->city = $request->input('ciudad');
        $nuevoLocal->region = $request->input('region');
        $nuevoLocal->verified = $request->input('verified');
        $nuevoLocal->user_id = $request->input('user_id');
        $nuevoLocal->save();
        Log::info('Nuevo local creado: ' . $nuevoLocal);
        return redirect()->route('dashboard')->with('success', 'Local creado exitosamente');
    }

    public function deleteBeer($id)
    {
        $beer = Beer::findOrFail($id);

        $beer->delete();

        return redirect()->back()->with('success', 'Cerveza eliminada exitosamente');
    }

    public function createBeer()
    {
        return view('partials.createbeer');
    }

    public function storeBeer(Request $request)
    {
        $user = Auth::user();

        $nuevaCerveza = new Beer();
        $nuevaCerveza->name = $request->input('name');
        $nuevaCerveza->color = $request->input('color');
        $nuevaCerveza->graduation = $request->input('graduation');
        $nuevaCerveza->taste = $request->input('taste');
        $nuevaCerveza->type = $request->input('type');
        $nuevaCerveza->description = $request->input('description');
        $nuevaCerveza->country = $request->input('country');
        $nuevaCerveza->city = $request->input('city');
        $nuevaCerveza->region = $request->input('region');
        $nuevaCerveza->image = $request->input('image');
        $nuevaCerveza->user_id = $request->input('user_id');
        $nuevaCerveza->save();
        Log::info('Nueva cerveza creada: ' . $nuevaCerveza);
        return redirect()->route('dashboard')->with('success', 'Cerveza creada exitosamente');
    }
}
