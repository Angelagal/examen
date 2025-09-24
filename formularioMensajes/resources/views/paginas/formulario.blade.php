@extends('plantillas.base')

@section('content')
    <h3 class="mb-4">Enviar mensaje</h3>

    <form id="formulario" class="card card-primary card-outline p-4" novalidate>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>

    <div id="respuesta" class="mt-4"></div>
@endsection

@section('scripts')
    @include('scripts.validacion-formulario')
@endsection
