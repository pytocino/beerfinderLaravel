<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GitController extends Controller
{
    public function actualizarRama()
    {
        $output = [];
        $return_var = 0;
        exec('git pull origin master', $output, $return_var);

        if ($return_var === 0) {
            // Éxito al actualizar la rama
            Log::info('Rama actualizada exitosamente: ' . implode("\n", $output));

            return redirect()->back()->with('exito', 'Rama actualizada exitosamente.');
        } else {
            // Error al actualizar
            Log::error('Error al actualizar la rama: ' . implode("\n", $output));

            return redirect()->back()->with('error', 'Error al actualizar la rama.');
        }
    }
}
