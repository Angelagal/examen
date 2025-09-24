<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="text-center p-4 bg-white rounded shadow" style="width: 100%; max-width: 400px;">
        <h1 class="mb-4">Bienvenido a la Página de Inicio</h1>
        <p>Esta es la página principal a la que se redirige al salir del formulario.</p>
        <a href="{{ url('/registros') }}" class="btn btn-primary mt-3">Ver registros</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
