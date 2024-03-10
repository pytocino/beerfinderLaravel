<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\EventsLog;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BeerController extends Controller
{
    public function index()
    {
        // Obtener nombres de cervezas
        $beernames = Beer::all()->sortby('name');

        // Obtener 10 cervezas aleatorias
        $beers = Beer::inRandomOrder()->take(10)->get();

        // Incrementar el contador de visitas
        $visit = Visit::firstOrNew([]);
        $visit->count++;
        $visit->save();
        $visitCount = $visit->count;
        Log::info('Controlador de visitas', ['Numero de visita' => $visitCount]);

        // Obtener la URL de la página anterior
        $previousUrl = url()->previous();
        $horaActual = Carbon::now()->addHour();
        /* $fullUrl = request()->fullUrl(); */

        // Registrar el evento en el log de eventos
        $eventLogData = [
            'event_type' => 'Visit', // Tipo de evento
            'event_date' => now()->toDateString(), // Fecha actual
            'event_time' => $horaActual->toTimeString(), // Hora actual
            'previous_url' => $previousUrl, // URL previa
            'ip_address' => request()->ip(), // Dirección IP del cliente
        ];
        EventsLog::create($eventLogData);

        // Retornar la vista con los datos necesarios
        return view('welcome')
            ->with('beernames', $beernames)
            ->with('beers', $beers)
            ->with('visitCount', $visitCount);
    }
}
