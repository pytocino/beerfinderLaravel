<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Beer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\EventsLog;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $cerves = Beer::all();
        $locales = Local::all()->sortBy('name');
        $beers = Beer::all()->sortBy('name');
        $user = Auth::user();
        $locals = DB::table('locals')
            ->where('user_id', $user->id)
            ->get();

        $locals = Local::with('beers')->where('user_id', $user->id)->get();
        $eventsByHour = EventsLog::select(DB::raw('HOUR(event_time) as hour'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('HOUR(event_time)'))
            ->orderBy(DB::raw('HOUR(event_time)'))
            ->get();

        // Obtener la distribución de eventos por URLs de referencia
        $eventsByPreviousUrl = EventsLog::select('previous_url', DB::raw('COUNT(*) as total'))
            ->groupBy('previous_url')
            ->orderBy('total', 'desc')
            ->limit(10) // Limitar a las 10 primeras rutas con más eventos
            ->get();

        /* // Transformar los datos para mostrar el dominio base y la siguiente ruta después del dominio
        $eventsByPreviousUrl->transform(function ($item, $key) {
            // Obtener el host de la URL
            $host = parse_url($item->previous_url, PHP_URL_HOST);

            // Si el host está vacío, retornar la URL completa
            if (!$host) {
                return (object) ['first_route' => $item->previous_url, 'total' => $item->total];
            }

            // Obtener la ruta después del dominio
            $path = parse_url($item->previous_url, PHP_URL_PATH);
            // Si la ruta está vacía, retornar solo el dominio base
            if (!$path) {
                return (object) ['first_route' => $host, 'total' => $item->total];
            }

            // Obtener la primera parte de la ruta después del dominio
            $parts = explode('/', $path);
            $firstRoute = $parts[1];

            // Retornar el dominio base y la primera ruta después del dominio
            return (object) ['first_route' => $host . '/' . $firstRoute, 'total' => $item->total];
        }); */

        $eventsByIP = EventsLog::select('ip_address', DB::raw('COUNT(*) as total'))
            ->groupBy('ip_address')
            ->orderBy('total', 'desc')
            ->get();


        return view('dashboard', ['eventsByIP' => $eventsByIP, 'eventsByPreviousUrl' => $eventsByPreviousUrl, 'eventsByHour' => $eventsByHour, 'locals' => $locals, 'beers' => $beers, 'user' => $user, 'locales' => $locales, 'cerves' => $cerves, 'users' => $users]);
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
            'image' => $request->file('image')->storeAs('images', $cerve->name . '.jpg', ['disk' => 'public']),
        ]);

        return redirect()->back()->with('success', 'Cerveza actualizada exitosamente');
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
        $nuevoLocal->city = $request->input('city');
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
        $nuevoLocal->city = $request->input('city');
        $nuevoLocal->region = $request->input('region');
        $nuevoLocal->verified = $request->input('verified');
        $nuevoLocal->user_id = $request->input('user_id');
        $nuevoLocal->save();
        Log::info('Nuevo local creado: ' . $nuevoLocal);
        return redirect()->route('dashboard')->with('success', 'Local creado exitosamente');
    }

    public function deleteBeer($id)
    {
        try {
            // Encuentra la cerveza por su ID
            $beer = Beer::findOrFail($id);
            // Verifica que el usuario autenticado sea el propietario de la cerveza
            // Borra la cerveza
            $beer->delete();
            $beer->locals()->detach();
            // Registra en el log
            Log::info('Cerveza borrada: ' . $beer);

            // Redirige al usuario con un mensaje de éxito
            return redirect()->route('dashboard')->with('success', 'Cerveza borrada exitosamente');
        } catch (\Exception $e) {
            // Manejo de errores
            Log::error('Error al borrar la cerveza: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al borrar la cerveza. Por favor, intenta de nuevo.');
        }
    }

    public function deleteLocal($id)
    {
        try {
            // Encuentra el local por su ID
            $local = Local::findOrFail($id);
            $local->beers()->detach();

            // Borra el local
            $local->delete();

            // Registra en el log
            Log::info('Local borrado: ' . $local);

            // Redirige al usuario con un mensaje de éxito
            return redirect()->route('dashboard')->with('success', 'Local borrado exitosamente');
        } catch (\Exception $e) {
            // Manejo de errores
            Log::error('Error al borrar el local: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al borrar el local. Por favor, intenta de nuevo.');
        }
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
