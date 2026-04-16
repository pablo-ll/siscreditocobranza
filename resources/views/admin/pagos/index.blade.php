@extends('adminlte::page')

@section('content_header')
<h1><b>Pagos</b></h1>
<hr>
@stop

@section('content')
<div class="row">

    <div class="col-md-8">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Pagos</h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <tr>

                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">documento</th>
                            <th style="text-align: center">Cliente</th>
                            <th style="text-align: center">Cuota pagada</th>
                            <th style="text-align: center">Nro de cuotas</th>
                            <th style="text-align: center">fecha de pago</th>
                            <th style="text-align: center">Accion</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                        $contador = 1;
                        @endphp
                        @foreach ($pagos as $pago)
                        <tr>
                            <td style="text-align: center">{{ $contador++ }}</td>
                            <td>{{ $pago->prestamo->cliente->nro_documento }}</td>
                            <td>{{ $pago->prestamo->cliente->apellidos . ' ' . $pago->prestamo->cliente->nombres }}</td>
                            <td>{{ $pago->monto_pagado }}</td>
                            <td>{{ $pago->referencia_pago }}</td>
                            <td>{{ $pago->fecha_cancelado }}</td>

                            <td style="text-align: center">
                                <div class="btn-group" prestamo="group" aria-label="Basic example">
                                    
                                    <a href="{{ url('/admin/pagos/contratos', $pago->id) }}"
                                        style="border-radius: 4px" class="btn btn-dark btn-sm"><i
                                            class="fas fa-print"></i></a>
                                    <a href="{{ url('/admin/pagos/' . $pago->id . '/edit') }}"
                                        style="border-radius: 4px "
                                        class="btn btn-block bg-gradient-warning btn-sm">anular</a>
                                    <form action="{{ url('/admin/pagos', $pago->id) }}" method="post" id="form-delete-{{ $pago->id }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            data-id="{{ $pago->id }}"
                                            onclick="preguntar(this)">
                                            
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>



                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>




            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="card  card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Buscar cliente</h3>


            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        </div>
                        <select name="cliente_id" id="" class="form-control select2">
                            <option value="">Buscar cliente...</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->nro_documento . ' - ' . $cliente->apellidos . ' ' . $cliente->nombres }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @error('cliente_id')
            <small style="color: red">{{ $message }}</small>
            @enderror
         



            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


</div>

@stop

@section('css')
<style>

    .select2-container .select2-selection--single {
        height: 40px !important;
        /* Ajusta la altura total del select */
    }
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
      $('.select2').select2();

    $('.select2').on('change', function() {
        var id = $(this).val();
        //alert(cliente_id);
        if (id) {
            window.location.href = "{{url('/admin/pagos/prestamos/cliente/')}}" + "/" + id;

        }
    });
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ pagos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                "infoFiltered": "(Filtrado de _MAX_ total pagos)",
                "lengthMenu": "Mostrar _MENU_ pagos",
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