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

    public function updateLocal(Request $request, $id)
    {
        // Encuentra el local por su ID
        $local = Local::findOrFail($id);

        // Actualiza los datos del local con los valores del formulario
        $local->update([
            'type' => $request->input('type'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'website' => $request->input('website'),
            'city' => $request->input('city'),
            'region' => $request->input('region'),
        ]);

        // Maneja la actualización de la imagen si se ha cargado una nueva
        if ($request->hasFile('imagen')) {
            // Procesa y guarda la imagen
            $imagePath = $request->file('imagen')->store('ruta_de_almacenamiento');
            $local->image = $imagePath;
            $local->save();
        }

        // Redirecciona o devuelve una respuesta apropiada (puede ser una redirección a la misma página)
        return redirect()->back()->with('success', 'Local actualizado exitosamente');
    }
}
