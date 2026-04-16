@extends('adminlte::page')

@section('content_header')
    <h1><b>Prestamos del cliente {{ $cliente->apellidos." ".$cliente->nombres }}</b></h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary"> <div class="card-header">
                <h3 class="card-title">Historial de prestamos</h3>
            </div>
            
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">Documento</th>
                            <th style="text-align: center">Cliente</th>
                            <th style="text-align: center">Monto prestado</th>
                            <th style="text-align: center">Tasa de interés</th>
                            <th style="text-align: center">Modalidad</th>
                            <th style="text-align: center">Nro de cuotas</th>
                            <th style="text-align: center">Fecha inicio</th>
                            <th style="text-align: center">Estado</th>
                            <th style="text-align: center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $contador = 1; @endphp
                        @foreach ($prestamos as $prestamo)
                        <tr>
                            <td style="text-align: center">{{ $contador++ }}</td>
                            <td>{{ $prestamo->cliente->nro_documento }}</td>
                            <td>{{ $prestamo->cliente->apellidos . ' ' . $prestamo->cliente->nombres }}</td>
                            <td>{{ $prestamo->monto_prestado }}</td>
                            <td>{{ $prestamo->tasa_interes }}%</td>
                            <td>{{ $prestamo->modalidad }}</td>
                            <td>{{ $prestamo->nro_cuotas }}</td>
                            <td>{{ $prestamo->fecha_inicio }}</td>
                            <td>
                                <span class="badge {{ $prestamo->estado == 'pagado' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $prestamo->estado }}
                                </span>
                            </td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group">
                                       <a href="{{ url('/admin/pagos/prestamos/create', $prestamo->id) }}"
                                        style="border-radius: 4px" class="btn btn-info btn-sm"><i
                                            class="fas fa-money-bill-wane"></i>Ver pagos</a>
                                    </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> </div> </div> </div> @stop

@section('css')
<style>
    /* Fondo transparente y sin borde en el contenedor*/
    #example1_wrapper .dt-buttons {
        background-color: transparent;
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center;
        gap: 10px;
        /* espaciado entre botones */
        margin-bottom: 15px;
    }

    /* estilo personalizado de los botones */
    #example1_wrapper .btn {
        color: #fff;
        /* color del texto blanco */
        border-radius: 4px;
        padding: 5px 15px;
        font-size: 14px;
    }

    /** colores por tipo de boton */

    .btn-danger {
        background-color: #dc3545;
        border: none
    }

    .btn-success {
        background-color: #28a745;
        border: none
    }

    .btn-info {
        background-color: #17a2b8;
        border: none
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border: none
    }

    .btn-default {
        background-color: #6e7176;
        color: #212529;
        border: none
    }
</style>
@stop

@section('js')
<script>
    // Función de confirmación genérica
    function preguntar(boton) {
        const id = boton.getAttribute('data-id');
        Swal.fire({
            title: '¿Desea eliminar este registro?',
            text: "¡No podrás revertir esto!",
            icon: 'question',
            showCancelButton: true, // Usamos cancel en lugar de deny para mejor UX
            confirmButtonColor: '#a5161d',
            cancelButtonColor: '#270a0a',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviamos el formulario específico usando el ID
                document.getElementById('form-delete-' + id).submit();
            }
        });
    }
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Prestamos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Prestamos",
                "infoFiltered": "(Filtrado de _MAX_ total Prestamos)",
                "lengthMenu": "Mostrar _MENU_ Pretamos",
                "loandingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                    text: '<i class="fas fa-copy"></i>COPIAR',
                    extend: 'copy',
                    className: 'btn btn-default'
                },
                {
                    text: '<i class="fas fa-file-pdf"></i>PDF',
                    extend: 'pdf',
                    className: 'btn btn-danger'
                },
                {
                    text: '<i class="fas fa-file-csv"></i>CSV',
                    extend: 'csv',
                    className: 'btn btn-info'
                },
                {
                    text: '<i class="fas fa-file-excel"></i>EXCEL',
                    extend: 'excel',
                    className: 'btn btn-success'
                },
                {
                    text: '<i class="fas fa-print"></i>IMPRIMIR',
                    extend: 'print',
                    className: 'btn btn-warning'
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
    });
</script>
@stop