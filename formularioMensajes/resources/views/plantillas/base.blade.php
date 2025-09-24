<!DOCTYPE html>
<html lang="es">
<head>
    @include('componentes.encabezado')
</head>
<body class="hold-transition sidebar-mini bg-light">
<div class="wrapper">

    @include('componentes.menu-lateral')

    <!-- Contenido principal -->
    <div class="content-wrapper p-4">
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

</div>

@yield('scripts')

</body>
</html>
