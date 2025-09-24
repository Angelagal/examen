<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MensajeController extends Controller
{
    public function index()
    {
        return view('paginas.formulario');
    }

    public function guardar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        $archivo = 'mensajes.json';

        $datos = [];

        if (Storage::exists($archivo)) {
            $contenido = Storage::get($archivo);
            $datos = json_decode($contenido, true);

            if (!is_array($datos)) {
                $datos = [];
            }
        }

        $datos[] = $validated;

        Storage::put($archivo, json_encode($datos, JSON_PRETTY_PRINT));
        return response()->json(['success' => true]);
    }

    public function registros()
    {
        $archivo = 'mensajes.json';
        if (Storage::exists($archivo)) {
            $contenido = Storage::get($archivo);
            $mensajes = json_decode($contenido, true) ?? [];
        } else {
            $mensajes = [];
        }

        return view('paginas.registros', compact('mensajes')); 
    }

    public function mostrarJson()
    {
        $archivo = 'mensajes.json';

        if (Storage::exists($archivo)) {
            $contenido = Storage::get($archivo);
            return response($contenido)->header('Content-Type', 'application/json');
        }

        return response()->json([]);
    }

    public function actualizarMensajesJson()
    {
        $jsonUrl = url('/mensajes-json'); 
        $contenido = file_get_contents($jsonUrl);

        file_put_contents(storage_path('app/mensajes.json'), $contenido);

        return response()->json(['success' => true, 'message' => 'mensajes.json actualizado desde /mensajes-json']);
    }
}
