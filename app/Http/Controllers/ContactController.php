<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function sendUserEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Reemplaza 'tucorreo@example.com' con tu dirección de email
        Mail::to('pedrodavidg88@gmail.com')->send(new ContactFormMail($data));

        return back()->with('success', '¡Correo enviado correctamente!');
    }

    public function sendLocalEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Reemplaza 'tucorreo@example.com' con tu dirección de email
        Mail::to('pedrodavidg88@gmail.com')->send(new ContactFormMail($data));

        return back()->with('success', '¡Correo enviado correctamente!');
    }
}
