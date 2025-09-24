@extends('plantillas.base')

@section('content')
    <h3 class="mb-4">Listado de mensajes enviados</h3>

    <div class="card card-outline card-primary shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabla-mensajes" class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mensajes as $msg)
                            <tr>
                                <td>{{ $msg['nombre'] }}</td>
                                <td>{{ $msg['email'] }}</td>
                                <td>{{ $msg['mensaje'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No hay mensajes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tabla-mensajes').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50]
            });
        });
    </script>
@endsection