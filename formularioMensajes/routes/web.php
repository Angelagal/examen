<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensajeController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actualizar-json', function () {
    $response = Http::get(url('/mensajes-json'));
    
    if ($response->successful()) {
        Storage::put('mensajes.json', $response->body());
        return "Archivo actualizado con éxito.";
    } else {
        return "Error al obtener mensajes.";
    }
});
Route::get('/actualizar-mensajes-json', [App\Http\Controllers\MensajeController::class, 'actualizarMensajesJson']);

Route::get('/', [MensajeController::class, 'index']); // formulario
Route::post('/guardar', [MensajeController::class, 'guardar']); // guardar mensaje
Route::get('/registros', [MensajeController::class, 'registros']); // mostrar mensajes
Route::get('/mensajes-json', [MensajeController::class, 'mostrarJson']);

///Se agrega esta ruta para el botón salir que no marque un error  sino otra pagina

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');



