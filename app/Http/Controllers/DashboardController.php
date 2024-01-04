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

    public function editLocal(Request $request)
    {
        // Obtener el id del local por su nombre
        $name = $request->input('name');
        $id_name = Local::where('name', $name)->first();

        $local = Local::find($id_name->id);
        // Verificar si el local existe
        if (!$local) {
            return redirect()->back()->with('error', 'Local not found');
        }

        // Validar los datos del formulario de edición
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
        ]);

        // Actualizar los datos del local
        $local->name = $validatedData['name'];
        $local->address = $validatedData['address'];
        $local->city = $validatedData['city'];
        $local->state = $validatedData['state'];
        $local->region = $validatedData['region'];
        $local->email = $validatedData['email'];
        $local->phone = $validatedData['phone'];
        $local->website = $validatedData['website'];
        $local->update($request->all() + $validatedData);

        return redirect()->back()->with('success', 'Local updated successfully');
    }
}
